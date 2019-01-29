<?php
require("db.class.php");
class Scheda extends Db{
  public $scheda;
  function __construct($scheda){ $this->scheda = $scheda; }
  public function getScheda(){
    $regexp="/FOTOGR*/\-\/[a-zA-Z{1,2,3}]/\-\/\d{4}/?/";
    $sql="select * from foto2,file where file.id_scheda=foto2.id_scheda and foto2.id_scheda = ".$this->scheda.";";
    $query=$this->simple($sql);
    $info = array_filter(array_diff($query[0], ["-"]));
    $list['dgn_numsch']=$info['dgn_numsch2'];
    $list['path']=$info['path'];
    $list['id_foto']=$info['id'];
    // $list['id_scheda']=$info['id_scheda'];
    $list['titolo']=(!isset($info['sog_titolo'])) ? substr($path,0,-4) : $info['sog_titolo'];
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
    if(isset($info['dtc_ffile'])){$dtc[1]=$dtc[1]."(".$info['dtc_ffile'].")";}
    if(isset($info['dtc_misfd'])){$dtc[2]=strtolower($info['dtc_misfd']);}
    $dtc = implode(", ",$dtc);
    $list['dtc']=$dtc;
    $list['sog_sogg']=$info['sog_sogg'];
    if(isset($info['sog_autore'])){$sogg = "autore: ".$info['sog_autore'];}
    if(isset($info['sog_note'])){$sogg .= " (".$info['sog_note'].")";}
    $list['sog_autore'] = $sogg;
    if(isset($info['sog_notestor'])){$list['notestor']= "Note storiche: ".$info['sog_notestor'];}
    if(isset($info['alt_note'])){
      // if(preg_match($regexp, $info['alt_note'], $url)) {
      //   $info['alt_note']=preg_replace($regexp, "<a href='{$url[0]}'>{$url[0]}</a> ", $info['alt_note']);
      // }
      $list['note']= $info['alt_note'];
    }
    return array("sql"=>$sql,"scheda"=>$info,"list"=>$list);
  }
}


?>
