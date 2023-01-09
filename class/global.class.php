<?php
require("db.class.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require ('mailer/autoload.php');

class General extends Db{
  function __construct(){}

  public function getMarker(){
    $sql = "select t.id_localita, t.top_nomai localita, array_agg(scheda.id) foto, st_X(st_transform(ST_SetSRID(t.geom, 32632), 4326)) lon, st_Y(st_transform(ST_SetSRID(t.geom, 32632), 4326)) lat
    from topo_mappa t
    INNER JOIN aree on t.id_localita = aree.id_localita
    INNER JOIN aree_scheda on aree.nome_area = aree_scheda.id_area
    INNER JOIN scheda on aree_scheda.id_scheda = scheda.id
    INNER JOIN file f on f.id_scheda = scheda.id
    group by t.id_localita, t.top_nomai, t.geom;";
    return $this->simple($sql);
  }

  ###NOTE: FUNZIONI PER LISTE IMMAGINI
  public function imgWall($limit=array(), $filter=null){
    // return [$limit,$filter];
    // $sql="select * from viewscheda ".$filter." order by random() ";
    $sql=" SELECT
    s.id,
    s.dgn_dnogg,
    c.cro_spec,
    s.dgn_numsch,
    f.sog_titolo,
    f.dtc_icol,
    f.dtc_mattec,
    f.dtc_ffile,
    f.dtc_misfd,
    f.sog_sogg,
    f.sog_autore,
    f.sog_note,
    f.sog_notestor,
    f.alt_note,
    p.path,
    t.tags,
    s.pubblica
   FROM scheda s
   JOIN foto2 f ON f.id_scheda = s.id
   LEFT JOIN tags t ON t.scheda = s.id
   LEFT JOIN file p ON p.id_scheda = s.id
   LEFT JOIN cronologia c ON c.id_scheda = s.id
   left JOIN aree_scheda ON aree_scheda.id_scheda = f.id_scheda
   left JOIN area ON aree_scheda.id_area = area.id
   left JOIN aree ON aree.nome_area = area.id
   left JOIN comune ON comune.id = aree.id_comune
   where ".join(" and ",$filter)." group by s.id, s.dgn_dnogg, c.cro_spec, s.dgn_numsch, f.sog_titolo, f.dtc_icol, f.dtc_mattec, f.dtc_ffile, f.dtc_misfd, f.sog_sogg, f.sog_autore,  f.sog_note, f.sog_notestor, f.alt_note, p.path, t.tags, s.pubblica order by random() ";
    if(!empty($limit)){$sql .= " limit ".$limit.";";}
    return $this->simple($sql);
    // return $sql;
  }

  public function initGallery($dati = array()){
    $out=[];
    $filter = [" s.pubblica = true and s.fine = ".$dati['statoScheda']];

    if($dati['filtro'] == 'tag'){ array_push($filter, "'".$dati['tag']."' in (select(unnest(tags))) ");}

    if($dati['filtro'] == 'geotag'){ array_push($filter, " comune.id = ".$dati['val']);}

    if($dati['filtro'] == 'titolo'){
      $keyArr = explode(" ",$dati['tag']);
      $keywords = implode(" & ", substr_replace($keyArr, ':*', -1));
      array_push($filter, "to_tsvector(concat_ws(' ',sog_titolo,dgn_numsch,dgn_dnogg,cro_spec,sog_sogg,sog_note,sog_notestor,alt_note)) @@ to_tsquery('".$keywords."')");
    }
    return $this->imgWall([],$filter);
  }

  public function lazyLoad($filtro=null,$tag=null,$val=null){
    $out=array();
    switch ($filtro) {
      case 'tag':
        $filter = "where '".$tag."' in(select(unnest(tags))) ";
        $out['img'] = $this->imgWall(array(),$filter);
        $txt2 = 'a cui è associata la tag "'.$tag.'"';
      break;
      case 'geotag':
        $sql="select * from gallery where id_comune = ".$val." order by random();";
        $out['img'] = $this->simple($sql);
        $txt2 = 'scattata nel Comune di "'.$tag.'"';
      break;
      case 'titolo':
        $keywords = str_replace(' ', ' & ', $tag);
        $filter = "WHERE to_tsvector(concat_ws(' ',sog_titolo,dgn_numsch,dgn_dnogg,cro_spec,sog_sogg,sog_note,sog_notestor,alt_note)) @@ to_tsquery('".$keywords."') ";
        $out['img'] = $this->imgWall(array(),$filter);
        $txt2 = 'che contengono le parole "'.$tag.'"';
      break;
      case null:
        $out['img'] =  $this->imgWall();
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
  public function tagList(){
    $out = array();
    $out['geotag']=$this->geotag();
    $out['tag']=$this->tag();
    return $out;
  }

  private function geotag(){
    $sql = "SELECT id_comune id,comune tag,count(*) schede from gallery where comune != '-' group by id_comune,comune order by comune asc;";
    $arr =  $this->simple($sql);
    return $this->cluster($arr);
  }

  private function tag(){
    $sql="select row_number() over() id,unnest(tags) as tag, count(*) as schede from viewscheda group by tag having count(*) > 10 order by tag asc;";
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
      $out[$k]['size']=$font;
    }
    return $out;
  }

  public function getIdByNumsch($sk){
    return $this->simple("select id from viewscheda where dgn_numsch = '".$sk['numsch']."';");
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
