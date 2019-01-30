<?php
require("db.class.php");
class General extends Db{
  function __construct(){}
  public function imgWall($dati){
    $sql="select * from gallery order by random() limit ".$dati['limit'].";";
    return $this->simple($sql);
  }

  public function lazyLoad($tag=null,$val=null){
    if ($tag==null) {$filter = '';}
    else{
      $filter = 'where ';
      $param=array();
      if ($tag=='geotag') { $param[] = 'id_comune ='.$val;}
      if ($tag=='tag') {
        $param[] = "'".$val."' in(select(unnest(tags)))";
        $param[] = "id_comune != 3";
        $param[] = "comune !='-'";
      }
      $filter .= implode(" and ",$param);
    }
    $sql="select * from gallery ".$filter." order by random();";
    $data = $this->simple($sql);
    $imgList=$this->remove_duplicateKeys("path",$data);
    return array("sql"=>$sql,"img"=>$imgList);
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

  public function tagList(){
    $out = array();
    $out['geotag']=$this->geotag();
    $out['tag']=$this->tag();
    return $out;
  }

  private function geotag(){
    $sql = "SELECT id_comune id,comune tag,count(*) schede from gallery where comune != '-' group by id_comune,comune order by random();";
    $arr =  $this->simple($sql);
    return $this->cluster($arr);
  }

  private function tag(){
    $sql="select row_number() over() id,unnest(tags) as tag, count(*) as schede from gallery group by tag having count(*) > 10 order by random();";
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
    return $this->simple("select id_scheda from foto2 where dgn_numsch2 = '".$sk['numsch']."';");
  }
}

?>
