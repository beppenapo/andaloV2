<?php
require("db.class.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require ('mailer/autoload.php');

class General extends Db{
  function __construct(){}

  ###NOTE: FUNZIONI PER LISTE IMMAGINI
  public function imgWall($limit=array(), $filter=null){
    $sql="select * from viewscheda1 ".$filter." order by random() ";
    if(!empty($limit)){$sql .= " limit ".$limit['limit'].";";}
    return $this->simple($sql);
  }


  public function lazyLoad($filtro=null,$tag=null,$val=null, $fine =2){
    $out=array();

    switch ($filtro) {
      case 'tag':
        $filter = "where '".$tag."' in(select(unnest(tags))) AND fine = $fine  ";
        $out['img'] = $this->imgWall(array(),$filter);
        $txt2 = 'a cui è associata la tag "'.$tag.'"';
      break;
      case 'geotag':
        $sql="select * from gallery1 where id_comune = ".$val." AND fine = $fine  order by random();";
        $out['img'] = $this->simple($sql);
        $txt2 = 'scattata nel Comune di "'.$tag.'"';
      break;
      case 'users':
        $filter = "where '".$tag."' = sog_autore AND fine = $fine  ";
        $out['img'] = $this->imgWall(array(),$filter);
        $txt2 = 'a cui è associato l\'autore "'.$tag.'"';
      break;	  
      case 'titolo':
        $keywords = str_replace(' ', ' & ', $tag);
        $filter = "WHERE to_tsvector(concat_ws(' ',sog_titolo,dgn_numsch,dgn_dnogg,cro_spec,sog_sogg,sog_note,sog_notestor,alt_note)) @@ to_tsquery('".$keywords."') AND fine = $fine ";
        $out['img'] = $this->imgWall(array(),$filter);
        $txt2 = 'che contengono le parole "'.$tag.'"';
      break;
      case null:
        $filter = "WHERE fine = $fine ";
        $out['img'] =  $this->imgWall([], $filter);
        $txt2 = 'totali';
        break;
    }
    $tot = count($out['img']);

    if ($tot == 0) {
      $out['title'] = 'Nessuna immagine corrispondente al tuo criterio di ricerca!';
    }else {
      $txt1 = $tot == 1 ? ' immagine ' : ' immagini ';
      $out['title'] = $tot.$txt1.$txt2;
    }
    return $out;
  }

  private function remove_duplicateKeys($key,$data){
    $_data = array();
    foreach ($data as $v) {
      if (isset($_data[$v[$key]])) { continue; }
      $_data[$v[$key]] = $v;
    }
    $data = array_values($_data);
    return $data;
  }


  ###NOTE: FUNZIONI PER LISTE TAGS
  public function tagList($fine = 2){
    $out = array();
    $out['geotag']=$this->geotag($fine);
    $out['tag']=$this->tag($fine);
	$out['users'] = $this->users($fine);
    return $out;
  }

  private function geotag($fine){
    $sql = "SELECT id_comune id,comune tag,count(*) schede from gallery1 where comune != '-'   AND fine = $fine  group by id_comune,comune order by comune asc;";
    $arr =  $this->simple($sql);
    return $this->cluster($arr);
  }

  private function tag($fine){
    $sql="select row_number() over() id,unnest(tags) as tag, count(*) as schede from viewscheda1 WHERE fine = $fine group by tag having count(*) > 10 order by tag asc;";
    $arr =  $this->simple($sql);
    return $this->cluster($arr);
  }
  

  private function users($fine){
    $sql="SELECT ROW_NUMBER() OVER() ID, sog_autore AS users, COUNT (*) AS schede FROM viewscheda1 WHERE sog_autore !='-' AND fine = $fine  AND LENGTH(sog_autore) < 50 GROUP BY sog_autore HAVING COUNT ( * ) > 10  ORDER BY sog_autore ASC;";
    $arr =  $this->simple($sql);
    return $this->cluster($arr);
  }  

  private function cluster($arr = array()){
    $max = max(array_column($arr, 'schede'));
    $cluster = $max / 10;
    $out=array();
    $font='';
    foreach ($arr as $k => $v) {
      switch (true) {
        case ($v['schede'] <= $cluster): $font = 12; break;
        case ($v['schede'] > $cluster && $v['schede'] <= ($cluster * 2) ): $font = 16; break;
        case ($v['schede'] > ($cluster * 2) && $v['schede'] <= ($cluster * 3) ): $font = 18; break;
        case ($v['schede'] > ($cluster * 3) && $v['schede'] <= ($cluster * 4) ): $font = 20; break;
        case ($v['schede'] > ($cluster * 4) && $v['schede'] <= ($cluster * 5) ): $font = 22; break;
        case ($v['schede'] > ($cluster * 5) && $v['schede'] <= ($cluster * 6) ): $font = 24; break;
        case ($v['schede'] > ($cluster * 6) && $v['schede'] <= ($cluster * 7) ): $font = 26; break;
        case ($v['schede'] > ($cluster * 7) && $v['schede'] <= ($cluster * 8) ): $font = 28; break;
        case ($v['schede'] > ($cluster * 8) && $v['schede'] <= ($cluster * 9) ): $font = 30; break;
        case ($v['schede'] > ($cluster * 9) && $v['schede'] <= $max ): $font = 32; break;
        default: $font = 12;
      }
      $out[$k]['id']=$v['id'];
      $out[$k]['tag']=$v['tag'];
      $out[$k]['schede']=$v['schede'];
      $out[$k]['users']=$v['users'];
      $out[$k]['size']=$font;
    }
    return $out;
  }

  public function getIdByNumsch($sk){
    return $this->simple("select id from viewscheda1 where dgn_numsch = '".$sk['numsch']."';");
  }


  public function feedback($dati=array()){
    $campi=[];
    foreach ($dati as $key => $value) { $campi[]=":".$key; }
    $sql = "insert into feedback(".str_replace(":","",implode(",",$campi)).") values(".implode(",",$campi).");";
    $pdo = $this->pdo();
    $exec = $pdo->prepare($sql);
    try {
      $exec->execute($dati);
      $this->sendMail($dati);
      return true;
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  ### sendMail function
  protected function sendMail($dati=array()){
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
      $mail->Username = getenv('PDCGMAIL');
      $mail->Password = getenv('PDCGMAILPWD');
      //Recipients
      $mail->setFrom('biblioteche.paganella@gmail.com', 'Progetto Memoria');
      $mail->addAddress('andalo@biblio.tn.it');
      $mail->addAddress('alb.cosner@gmail.com');
      $mail->addBCC('beppenapo@gmail.com');
      // $mail->addAddress('beppenapo@gmail.com');
      $mail->addReplyTo($dati['email'], $dati['nome']);
      //Content
      $mail->isHTML(true);
      $mail->Subject = 'Progetto Memoria - nuovo feedback';
      $mail->Body    = $bodyTxt;
      $mail->AltBody = $altBodyTxt;
      $mail->send();
      return true;
    } catch (Exception $e) {
      return "Errore nell&apos;invio della mail!<br/>Se di seguito visualizzi un messaggio di errore, copialo ed invialo all&apos;amministratore di sistema - beppenapo@arc-team.com<br/>: ".$mail->ErrorInfo;
    }
  }
}

?>
