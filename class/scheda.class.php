<?php
require("db.class.php");
class Scheda extends Db{
  public $scheda;
  function __construct($scheda){ $this->scheda = $scheda; }
  public function getScheda(){
    $sql="select * from viewscheda where id = ".$this->scheda.";";
    $query=$this->simple($sql);
    $info = array_filter(array_diff($query[0], ["-"]));
    $list['dgn_numsch']="<strong>".$info['dgn_numsch']."</strong>";
    $list['path']=$info['path'];
    if (isset($info['dgn_dnogg'])) {
      $list['titolo']=$info['dgn_dnogg'];
    }elseif (!isset($info['dgn_dnogg']) && isset($info['sog_titolo'])) {
      $list['titolo']=$info['sog_titolo'];
    }else {
      $list['titolo']=substr($info['path'],0,-4);
    }
    $dtc=array();
    if(isset($info['dtc_icol'])){
      switch ($info['dtc_icol']) {
        case 'BN': $colore = 'Bianco e Nero'; break;
        case 'C': $colore = 'Colore'; break;
        default: $colore = $info['dtc_icol']; break;
      }
      $dtc[0]=$colore;
    }
    if(isset($info['dtc_mattec'])){$dtc[1]=$info['dtc_mattec'];}
    if(isset($info['dtc_ffile'])){$dtc[1]=$dtc[1]." (".$info['dtc_ffile'].")";}
    if(isset($info['dtc_misfd'])){$dtc[2]=strtolower($info['dtc_misfd']);}
    $dtc = implode(", ",$dtc);
    $list['dtc']="<span class='txt12'>".$dtc."</span>";
    $sogg = $info['cro_spec']." ";
    if(isset($info['sog_autore'])){$sogg .= "autore: ".$info['sog_autore'];}
    if(isset($info['sog_note'])){$sogg .= " (".$info['sog_note'].")";}
    $list['sog_autore'] = "<span class='txt12'>".$sogg."</span>";
    $list['sog_sogg']="<span class='txt14'>".$info['sog_sogg']."</span>";
    if(isset($info['sog_notestor'])){$list['notestor']= "<span class='txt14'>Note storiche: ".$info['sog_notestor']."</span>";}
    if(isset($info['alt_note'])){
      // $list['note']= "<span class='txt14'>".$info['alt_note']."</span>";
      $list['note']= $this->regexp($info['alt_note']);
    }
    $comune=$this->simple("select id_comune from gallery where id = ".$this->scheda.";");
    $tag['geo']=$this->geoTag($comune);
    $tag['tag']=$this->tag();
    return array("sql"=>$sql,"list"=>$list,"tag"=>$tag);
  }

  private function geoTag($id=array()){
    $comuni = array();
    foreach($id as $key => $value){
      foreach ($value as $k => $v) { if ($v !==5) { $comuni[$k]=$v; } }
    }
    $sql = "select * from gallery ";
    if (count($comuni)>0) { $sql .= "where id_comune = ".$comuni['id_comune']." and id <> ".$this->scheda." "; }
    $sql .= "order by random() limit 12;";
    return $this->simple($sql);
  }

  private function tag(){ return $this->simple("select unnest(tags) tag from tags where scheda = ".$this->scheda." order by tag asc;");
  }

  private function regexp($txt){
    $pattern="/(FOTO[A-Z]+-I{1,3}-\w{4})/";
    return preg_replace($pattern, "<a href='#$1' class='txt14 text-dark animation hyperLink' title='visualizza la scheda $1'>$1</a>", $txt);
  }
}


?>
