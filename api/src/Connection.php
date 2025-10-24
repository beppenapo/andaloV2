<?php 
namespace Biblio;
use PDO;
use Dotenv\Dotenv;

class Connection{
  public $conn;
  public function connect() {
    $envPath = realpath(__DIR__ . '/../config/.env');
    if ($envPath === false) {
      return "File .env non trovato nel percorso: " . __DIR__ . '/../config/.env';
    }

    $dotenv = Dotenv::createImmutable(dirname($envPath));
    $dotenv->load();

    $host = $_ENV['DB_HOST'];
    $port = $_ENV['DB_PORT'];
    $dbname = $_ENV['DB_NAME'];
    $user = $_ENV['DB_USER'];
    $password = $_ENV['DB_PASSWORD'];

    $conStr = sprintf(
      "pgsql:host=%s;port=%d;dbname=%s;user=%s;password=%s",
      $host,
      $port,
      $dbname,
      $user,
      $password
    );

    $this->conn = new \PDO($conStr);
    $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    
    // ✅ Disabilita JIT sempre per compatibilità con PostgreSQL 13
    try {
      $this->conn->exec("SET jit = off;");
      $this->conn->exec("SET jit_above_cost = -1;");
      $this->conn->exec("SET jit_inline_above_cost = -1;");
      $this->conn->exec("SET jit_optimize_above_cost = -1;");
    } catch (\Exception $e) {
      // Ignora errori se il comando non è supportato
    }
  }

  public function pdo(){
    if (!$this->conn){ $this->connect();}
    return $this->conn;
  }

  public function simple($sql){
    $pdo = $this->pdo();
    $exec = $pdo->prepare($sql);
    
    try {
      $execute = $exec->execute();
    } catch (\PDOException $e) {
      // Se è errore JIT, riprova con parametri più restrittivi
      if (strpos($e->getMessage(), 'llvmjit.so') !== false) {
        try {
          $pdo->exec("SET jit_above_cost = 0;");
          $pdo->exec("SET jit_tuple_deforming = off;");
          $pdo->exec("SET jit_expressions = off;");
          $execute = $exec->execute();
        } catch (\Exception $retryError) {
          throw $retryError;
        }
      } else {
        throw $e;
      }
    }
    
    if(!$execute){ throw new \Exception("Error Processing Request: ".$execute, 1); }
    return $exec->fetchAll(PDO::FETCH_ASSOC);
  }

  public function prepared(string $sql, array $dati){
    $pdo = $this->pdo();
    $exec = $pdo->prepare($sql);
    $execute = $exec->execute($dati);
    if(!$execute){ throw new \Exception("Error Processing Request: ".$execute, 1); }
    return true;
  }

  public function returning(string $sql, array $dati){
    $pdo = $this->pdo();
    $exec = $pdo->prepare($sql);
    $res = $exec->execute($dati);
    if (!$res) { throw new \Exception("Error Processing Request: ".$exec, 1); }
    $returning = $exec->fetchAll();
    return $returning[0][0];
  }

  public function buildInsert(string $tab, array $dati){
    $field = [];
    $value = [];
    foreach ($dati as $key => $val) {
      $v = ":".$key;
      array_push($field,$key);
      array_push($value,$v);
    }
    $sql = "insert into ".$tab."(".join(",",$field).") values (".join(",",$value).");";
    return $sql;
  }

  public function buildUpdate(string $tab, array $filter, array $dati){
    $field = [];
    $where = [];
    foreach ($dati as $key => $val) {
      $v = $key == 'password' ? "crypt(:password, gen_salt('md5'))" : ":".$key;
      array_push($field,$key."=".$v);
    }
    foreach ($filter as $key => $val) { array_push($where,$key." = ".$val); }
    $sql = "update ".$tab." set ".join(",",$field)." where ".join(" AND ", $where).";";
    return $sql;
  }

  public function buildDelete(string $tab, array $filter){
    $where = [];
    foreach ($filter as $key => $val) { array_push($where,$tab.".".$key." = ".$val); }
    $sql = "delete from ".$tab." where ".join(" AND ", $where).";";
    return $sql;
  }

  public function begin(){
    $pdo = $this->pdo();
    $pdo->beginTransaction();
  }
  public function commit(){
    $pdo = $this->pdo();
    $pdo->commit();
  }
  public function rollback(){
    $pdo = $this->pdo();
    $pdo->rollBack();
  }

  public function __construct() {}
  public function __clone() {}
  public function __wakeup() {}
}

?>