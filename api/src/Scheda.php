<?php
namespace Biblio;
session_start();
use Biblio\File;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;
class Scheda extends Connection{
  public $file;
  
  function __construct(){ $this->file = new File(); }

  public function viewscheda(int $id): array{
    $conditions=[];
    $out=[];
    $out['scheda'] = $this->simple("select * from viewscheda where id = ".$id.";")[0];
    $out['geotag'] = $this->simple("select g.* from geotag g inner join viewscheda v on g.id =v.id where g.id = ".$id.";");
    $out['geom'] = $this->geom($id);

    if(count($this->tags($id)) > 0){
      $conditions[]=" v.tags && '".$out['scheda']['tags']."'::varchar[] ";
    }

    if(count($out['geotag']) > 0){
      $ids = array_column($out['geotag'], 'id_comune');
      $geoConditions = array_map(function($id) { return "g.id_comune = $id"; }, $ids);
      $conditions = array_merge($conditions,$geoConditions);
    }
    $queryString = implode(" or ", $conditions);
    $out['foto'] = $this->simple('select v.id, trim(v.sog_titolo) titolo, v.path from viewscheda v inner join geotag g on g.id = v.id where '.$queryString. ' order by random() limit 12;');
    return $out;
  }

  public function getScheda(int $id){
    $dati=[];
    $sql="select * from viewscheda where id = ".$id.";";
    $dati['scheda'] = $this->simple($sql);
    $dati['liste'] = $this->liste();
    $dati['tags'] = $this->tags($id);
    return $dati;
  }

  private function tags(int $id){ 
    return $this->simple("select unnest(tags) tag from tags where scheda = ".$id." order by tag asc;");
  }

  public function addTag(array $dati){
    try {
      $this->begin();
      $check = $this->simple("select count(*) from tags where scheda = ".$dati['scheda'].";")[0];
      if($check['count']==0){
        $sql = "insert into tags (scheda, tags) values (:scheda, :tag);";
        $dati['tag'] = '{' . $dati['tag'] . '}';
      }else{
        $sql = "update tags set tags = array_append(tags,:tag) where scheda = :scheda;";
      }
      $this->prepared($sql,$dati);
      $this->commit();
      return ["error"=>0, "output"=>'Ok, la parola chiave è stata associata al record'];
    } catch (\Throwable $e) {
      $this->rollback();
      return ["error"=>1, "output"=>$e->getMessage()];
    }
  }
  
  public function removeTag(array $dati){
    try {
      $this->begin();
      $sql = "update tags set tags = array_remove(tags,:tag) where scheda = :scheda;";
      $this->prepared($sql,$dati);
      $count = $this->countTag($dati['scheda']);
      if($count['tot'] == 0){
        $sql = "delete from tags where scheda = :scheda;";
        $this->prepared($sql,["scheda"=>$dati['scheda']]);
      }
      $this->commit();
      return ["error"=>0, "output"=>'Ok, la parola chiave non è più associata al record'];
    } catch (\Throwable $e) {
      $this->rollback();
      return ["error"=>1, "output"=>$e->getMessage()];
    }
  }

  private function countTag(int $scheda){
    $sql = "select cardinality(tags) tot from tags where scheda = ".$scheda.";";
    return $this->simple($sql)[0];
  }

  public function salvaScheda(array $dati){
    try {
      $schedaArr = [
        "dgn_tpsch" => 7,
        "livello" => 2,
        "dgn_livind" => 2,
        "fine"=>2,
        "dgn_numsch" => strtoupper($dati['dgn_numsch']),
        "dgn_dnogg" => $dati['dgn_dnogg'],
        "compilatore" => $dati['compilatore'],
        "data_compilazione" => $dati['data_compilazione']
      ];
      $cronologiaArr = ["cro_spec" => $dati['cro_spec']];
      $foto2Arr = [
        "sog_autore" => $dati['sog_autore'],
        "sog_titolo" => $dati['sog_titolo'],
        "sog_sogg" => $dati['sog_sogg'],
        "dtc_icol" => $dati['dtc_icol'],
        "dtc_mattec" => $dati['dtc_mattec'],
        "dtc_ffile" => $dati['dtc_ffile'],
        "dtc_misfd" => $dati['dtc_misfd'],
        "sog_note" => $dati['sog_note'],
        "sog_notestor" => $dati['sog_notestor'],
        "alt_note" => $dati['alt_note'],
        "fot_collocazione" => $dati['fot_collocazione'],
      ];
      $schedaSql = $this->buildInsert('scheda',$schedaArr);
      $schedaSql = rtrim($schedaSql, ";") . " returning id;";
      
      $this->pdo()->beginTransaction();
      
      $id = $this->returning($schedaSql, $schedaArr);
      $cronologiaArr['id_scheda'] = $id;
      $foto2Arr['id_scheda'] = $id;
      $cronologiaSql = $this->buildInsert('cronologia',$cronologiaArr);
      $foto2Sql = $this->buildInsert('foto2',$foto2Arr);
      $this->prepared($cronologiaSql,$cronologiaArr);
      $this->prepared($foto2Sql,$foto2Arr);
      
      $file = $dati['files']['file'];
      $fileExt = pathinfo($file['name'], PATHINFO_EXTENSION);
      $fileName = strtoupper($dati['dgn_numsch']).".".$fileExt;
      $fileArr = ["id_scheda"=>$id, "path"=>$fileName, "tipo"=>1];
      $fileSql = $this->buildInsert("file",$fileArr);
      $this->prepared($fileSql,$fileArr);
      $this->file->upload($file,$fileName);

      $this->pdo()->commit();
      return ["res"=> 1, "output"=>'Ok, la scheda è stata salvata', "id"=>$id];
    } catch (\Exception $e) {
      $this->pdo()->rollBack();
      return ["res"=>0, "output"=>$e->getMessage()];
    }
  }

  public function updateScheda(array $dati){
    try {
      $this->begin();
      $schedaKeys = ["id","dgn_dnogg","dgn_numsch","fine","note","pubblica"];
      $cronologiaKeys = ["id_scheda","cro_spec"];
      $fotoKeys = ["id_scheda","alt_note","dtc_icol", "dtc_ffile","dtc_mattec","dtc_misfd","sog_autore", "sog_note","sog_notestor","sog_sogg","sog_titolo", "fot_collocazione"];
      $scheda = [];
      $foto = [];
      $cronologia = [];
      $fileArr = [];

      foreach ($schedaKeys as $key) {if (isset($dati[$key])) {$scheda[$key] = $dati[$key];}}
      foreach ($cronologiaKeys as $key) {if (isset($dati[$key])) {$cronologia[$key] = $dati[$key];}}
      foreach ($fotoKeys as $key) {if (isset($dati[$key])) {$foto[$key] = $dati[$key];}}

      $schedaSql = $this->buildUpdate('scheda',['id'=>$dati['scheda']],$scheda);
      $cronologiaSql = $this->buildUpdate('cronologia',['id_scheda'=>$dati['scheda']],$cronologia);
      $fotoSql = $this->buildUpdate('foto2',['id_scheda'=>$dati['scheda']],$foto);

      $this->prepared($schedaSql,$scheda);
      $this->prepared($cronologiaSql,$cronologia);
      $this->prepared($fotoSql,$foto);
      
      if(isset($dati['files'])){
        $file = $dati['files']['file'];
        $fileExt = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = strtoupper($dati['dgn_numsch']).".".$fileExt;
        $fileArr = ["id_scheda"=>$dati['scheda'], "path"=>$fileName];
        $fileSql = $this->buildUpdate('file',['id_scheda'=>$dati['scheda']],$fileArr);
        $this->prepared($fileSql,$fileArr);
        $this->file->upload($file,$fileName);
      }
      $this->commit();
      return ["error"=> 0, "output"=>'Ok, la scheda è stata aggiornata'];
    } catch (\Throwable $e) {
      $this->rollback();
      return ["error"=>1, "output"=>$e->getMessage()];
    }
  }

  public function delScheda(array $dati){
    try {
      $this->prepared("delete from scheda where id = :id;", ["id"=>$dati['id']]);
      $this->file->deleteFile($dati['path']);
      return ["res"=> 1, "output"=>'Ok, la scheda è stata eliminata'];
    } catch (\Exception $e) {
      return ["res"=>0, "output"=>$e->getMessage()];
    }
  }

  public function liste(){
    $liste = array();
    $liste['dtc_icol'] = $this->simple("select * from lista_dtc_icol order by definizione asc;");
    $liste['dtc_mattec'] = $this->simple("select * from lista_dtc_mattec order by definizione asc;");
    $liste['dtc_ffile'] = $this->simple("select * from lista_dtc_ffile order by definizione asc;");
    $liste['tags'] = $this->simple("select * from tag order by tag asc;");
    return $liste;
  }

  public function checkNum(string $val){
    return $this->simple("select id from scheda where dgn_numsch = '".strtoupper($val)."';");
  }

  public function checkFileExists(string $name){
    return $this->file->checkFileExistsByName($name);
  }

  private function geom(int $id){
    $sql ="
    SELECT     CASE 
        WHEN json.features IS NULL THEN NULL 
        ELSE row_to_json(json.*) 
    END AS geometrie
      FROM (
        SELECT 'FeatureCollection'::text AS type, array_to_json(array_agg(features.*)) AS features
        FROM (
          SELECT 'Feature'::text AS type, st_asgeojson(st_transform(ST_SetSRID(area_int_poly.the_geom, 3857), 4326))::json AS geometry, row_to_json(prop.*) AS properties
          FROM area_int_poly
          JOIN (
            SELECT area.id AS id_area, area.nome as area, area_int_poly.id as id_geom, area_int_poly.the_geom
            FROM scheda
            JOIN aree_scheda ON scheda.id = aree_scheda.id_scheda
            JOIN area_int_poly ON aree_scheda.id_area = area_int_poly.id_area
            JOIN area ON area.id = area_int_poly.id_area
            WHERE scheda.id = ".$id." and area.tipo = 1 and area.id <> 14
          ) prop ON area_int_poly.id = prop.id_geom
        ) features
      ) json;";
    $res = $this->simple($sql);
    return $res[0]['geometrie'];
  }

  public function getIdByNumsch(string $sk){
    return $this->simple("select id from viewscheda where dgn_numsch = '".$sk."';")[0];
  }

  public function feedback(array $dati){
    try {
      if (empty($dati['nome']) || empty($dati['email']) || empty($dati['commento']) || empty($dati['scheda'])) { throw new Exception("Dati incompleti"); }
    
      if (!filter_var($dati['email'], FILTER_VALIDATE_EMAIL)) { throw new Exception("Email non valida"); }
      
      $this->begin();
      $feedbackSql = $this->buildInsert('feedback',$dati);
      $createDbRecord = $this->prepared($feedbackSql,$dati);
      if(!$createDbRecord){throw new Exception($createDbRecord);}
      $sendResult = $this->sendMail($dati);
      if ($sendResult !== true) { throw new Exception($sendResult); }
      $this->commit();
      return ["code"=>0, "msg"=>'Il tuo commento è stato inviato, grazie per la tua collaborazione!'];
    } catch (Exception $e) {
      return ["code"=>1, "msg"=>"Abbiamo riscontrato problemi nell'invio del tuo messaggio! Riprova o manda una mail ad andalo@biblio.tn.it<br/>".$e->getMessage()];
    }
  }

  protected function sendMail(array $dati){
    $envPath = realpath(__DIR__ . '/../config/.env');
    if ($envPath === false) {
      return "File .env non trovato nel percorso: " . __DIR__ . '/../config/.env';
    }

    $dotenv = Dotenv::createImmutable(dirname($envPath));
    $dotenv->load();

    $bodyTxt = "<p>Il giorno ".date('d m Y')." ".$dati['nome']." ha scritto:</p>";
    $bodyTxt .= "<p>".$dati['commento']."</p>";
    $bodyTxt .= "<br><a href='https://www.bibliopaganella.org/scheda.php?scheda=".$dati['scheda']."' target='_blank'>apri la scheda</a> ";
    $bodyTxt .= "<p>Per rispondere utilizza la seguente mail fornita dall'utente: ".$dati['email']."</p>";

    $altBodyTxt = "Il giorno ".date('d m Y')." ".$dati['nome']." ha scritto:\n";
    $altBodyTxt .= $dati['commento'];
    $altBodyTxt .= "\nlink alla scheda: https://www.bibliopaganella.org/scheda.php?scheda=".$dati['scheda'];
    $altBodyTxt .= "\nPer rispondere utilizza la seguente mail fornita dall'utente: ".$dati['email'];
    $mail = new PHPMailer(true);
    try {
      // $mail->SMTPDebug = 1;
      $mail->isSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->SMTPSecure = 'tls';
      $mail->SMTPAuth = true;
      $mail->Username = $_ENV['PDCGMAIL'];
      $mail->Password = $_ENV['PDCGMAILPWD'];
      //Recipients
      $mail->setFrom('biblioteche.paganella@gmail.com', 'Progetto Memoria');
      $mail->addAddress('andalo@biblio.tn.it');
      $mail->addAddress('alb.cosner@gmail.com');
      $mail->addReplyTo($dati['email'], $dati['nome']);
      //Content
      $mail->isHTML(true);
      $mail->Subject = 'Progetto Memoria - nuovo feedback';
      $mail->Body    = $bodyTxt;
      $mail->AltBody = $altBodyTxt;
      $mail->send();
      return true;
    } catch (Exception $e) {
      error_log($e->getMessage());
      return "Errore nell&apos;invio della mail!<br/>Se di seguito visualizzi un messaggio di errore, copialo ed invialo all&apos;amministratore di sistema - beppenapo@arc-team.com<br/>: ".$mail->ErrorInfo;
    }
  }
}

?>