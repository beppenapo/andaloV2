<?php
require("db.class.php");
class Scheda extends Db{
  public $scheda;
  function __construct($scheda){ $this->scheda = $scheda; }
  public function getScheda(){
    $sql="select
    f1.id,
    f1.dgn_dnogg,
    c.cro_spec,
    f2.dgn_numsch2,
    f2.sog_titolo,
    f2.dtc_icol,
    f2.dtc_mattec,
    f2.dtc_ffile,
    f2.dtc_misfd,
    f2.sog_sogg,
    f2.sog_autore,
    f2.sog_note,
    f2.sog_notestor,
    f2.alt_note,
    f.path
    from scheda f1
    inner join foto2 f2 on f2.id_scheda = f1.id
    left join file f on f.id_scheda = f1.id
    left join  cronologia c on c.id_scheda = f1.id
    where f1.id = ".$this->scheda.";";
    $query=$this->simple($sql);
    $info = array_filter(array_diff($query[0], ["-"]));
    $list['dgn_numsch']="<strong>".$info['dgn_numsch2']."</strong>";
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
    // $list['cro_spec']="<span class='txt12'>".$info['cro_spec']."</span>";
    $sogg = $info['cro_spec']." ";
    if(isset($info['sog_autore'])){$sogg .= "autore: ".$info['sog_autore'];}
    if(isset($info['sog_note'])){$sogg .= " (".$info['sog_note'].")";}
    $list['sog_autore'] = "<span class='txt12'>".$sogg."</span>";
    $list['sog_sogg']="<span class='txt14'>".$info['sog_sogg']."</span>";
    if(isset($info['sog_notestor'])){$list['notestor']= "<span class='txt14'>Note storiche: ".$info['sog_notestor']."</span>";}
    if(isset($info['alt_note'])){
      // $pattern="/(FOTO[A-Z]*-I{1,3}-\w{1,4})?/";
      $list['note']= "<span class='txt14'>".$info['alt_note']."</span>";
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
}


?>
