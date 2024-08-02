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
    $out=[];
    $out['scheda'] = $this->simple("select * from viewscheda where id = ".$id.";")[0];
    $out['geotag'] = $this->simple("select g.* from geotag g inner join viewscheda v on g.id =v.id where g.id = ".$id.";");
    $out['geom'] = $this->geom($id);

    if(count($out['geotag']) > 0){
      $ids = array_column($out['geotag'], 'id_comune');
      $conditions = array_map(function($id) { return "g.id_comune = $id"; }, $ids);
      $queryString = implode(" or ", $conditions);
      $out['foto'] = $this->simple('select v.id, trim(v.sog_titolo) titolo, v.path from viewscheda v inner join geotag g on g.id = v.id where '.$queryString. ' order by random() limit 12;');
    }
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
    $scheda = $dati['scheda']['id'];
    unset($dati['scheda']['id']);
    $schedaSql = $this->buildUpdate('scheda',['id'=>$scheda],$dati['scheda']);
    $cronologiaSql = $this->buildUpdate('cronologia',['id_scheda'=>$scheda],$dati['cronologia']);
    $fotoSql = $this->buildUpdate('foto2',['id_scheda'=>$scheda],$dati['foto2']);
    try {
      $this->pdo()->beginTransaction();
      $this->prepared($schedaSql,$dati['scheda']);
      $this->prepared($cronologiaSql,$dati['cronologia']);
      $this->prepared($fotoSql,$dati['foto2']);
      $this->pdo()->commit();
      return ["res"=> 1, "output"=>'Ok, la scheda è stata modificata'];
    } catch (\Exception $e) {
      $this->pdo()->rollBack();
      return ["res"=>0, "output"=>$e->getMessage()];
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
    $liste['dtc_icol'] = $this->dtc_icol();
    $liste['dtc_mattec'] = $this->dtc_mattec();
    $liste['dtc_ffile'] = $this->dtc_ffile();
    return $liste;
  }

  public function checkNum(string $val){
    return $this->simple("select id from scheda where dgn_numsch = '".strtoupper($val)."';");
  }

  public function checkFileExists(string $name){
    return $this->file->checkFileExistsByName($name);
  }

  private function dtc_icol(){
    $sql = "select * from lista_dtc_icol order by definizione asc;";
    return $this->simple($sql);
  }
  private function dtc_mattec(){
    $sql = "select * from lista_dtc_mattec order by definizione asc;";
    return $this->simple($sql);
  }
  private function dtc_ffile(){
    $sql = "select * from lista_dtc_ffile order by definizione asc;";
    return $this->simple($sql);
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