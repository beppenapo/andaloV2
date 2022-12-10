<?php
namespace Andalo;
use PDO;
class Conn {
  public $conn;
  private $dsn;
  private $host;
  private $port;
  private $user;
  private $pwd;
  private $db;

  public function connect() {
    $this->host = getenv('ANDALOHOST');
    $this->port = getenv('ANDALOPORT');
    $this->user = getenv('ANDALOUSER');
    $this->pwd =  getenv('ANDALOPWD');
    $this->db = getenv('ANDALODB');
    $this->dsn = "pgsql:host=".$this->host." port=".$this->port." user=".$this->user." password=".$this->pwd." dbname=".$this->db;
    $this->conn = new PDO($this->dsn);
    $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
  }

  public function pdo(){
    if (!$this->conn){ $this->connect();}
    return $this->conn;
  }

  public function simple($sql){
    // try {
      $pdo = $this->pdo();
      $exec = $pdo->prepare($sql);
      $res = $exec->execute();
      if (!$res) {throw new \Exception($res, 1);}
      return $exec->fetchAll(PDO::FETCH_ASSOC);
    // } catch (\Exception $e) {
    //   return $e->getMessage();
    // }
  }

  public function prepared($sql, $dati=array()){
    // try {
      $pdo = $this->pdo();
      $exec = $pdo->prepare($sql);
      $res = $exec->execute($dati);
      if(!$res){ throw new \Exception($res, 1); }
      return true;
    // } catch (\PDOException $e) {
    //   return array("res"=>false, "msg"=>'La query riporta il seguente errore:<br/>'.$e->getMessage());
    // } catch (\Exception $e) {
    //   return array("res"=>false, "msg"=>'La query riporta il seguente errore:<br/>'.$e->getMessage());
    // }
  }

  public function returning($sql, $dati=array()){
    // try {
      $pdo = $this->pdo();
      $exec = $pdo->prepare($sql);
      $res = $exec->execute($dati);
      if(!$res){ throw new \Exception($res, 1); }
      $returning = $exec->fetchAll();
      return array('res' => true, 'field'=>$returning[0][0] );
    // } catch (\PDOException $e) {
    //   return array("res"=>false, "msg"=>'La query riporta il seguente errore:<br/>'.$e->getMessage());
    // } catch (\Exception $e) {
    //   return array("res"=>false, "msg"=>'La query riporta il seguente errore:<br/>'.$e->getMessage());
    // }
  }
  public function buildInsert($tab, array $dati){
    $field = [];
    $value = [];
    foreach ($dati as $key => $val) {
      $v = $key == 'pwd' ? "crypt(:pwd, gen_salt('md5'))" : ":".$key;
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
      $v = $key == 'pwd' ? "crypt(:pwd, gen_salt('md5'))" : ":".$key;
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
  private function __clone() {}
  private function __wakeup() {}

}
?>
