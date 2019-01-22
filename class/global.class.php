<?php
require("db.class.php");
class General extends Db{
  function __construct(){}
  public function imgWall($dati){
    $sql="select scheda.id, foto2.sog_titolo, foto2.sog_autore, foto2.sog_sogg, file.path from scheda, foto2, file where foto2.id_scheda = scheda.id and file.id_scheda = scheda.id order by random() limit ".$dati['limit'].";";
    return $this->simple($sql);
  }

  public function lazyLoad(){
    $sql="select scheda.id, foto2.sog_titolo, foto2.sog_autore, foto2.sog_sogg, file.path from scheda, foto2, file where foto2.id_scheda = scheda.id and file.id_scheda = scheda.id order by random();";
    return $this->simple($sql);
  }

  public function tagList(){
    $out = array();
    $out['geotag']=$this->geotag();
    $out['tag']=$this->tag();
    return $out;
  }

  private function geotag(){
    $sql = "SELECT c.id, c.comune as tag, count(f.id) as schede FROM foto2 f, aree, area, aree_scheda, comune c WHERE aree.nome_area = area.id AND aree.id_comune = c.id AND aree_scheda.id_scheda = f.id_scheda AND area.tipo = 1 and aree_scheda.id_area = area.id and c.comune != '-' group by c.id, c.comune having count(f.id) > 10 order by random()";
    $arr =  $this->simple($sql);
    return $this->cluster($arr);
  }

  private function tag(){
    $sql="with t as (select unnest(tags) tag, count(tags.*) schede from tags group by tag having count(*) > 100)";
    $sql .= "select tag.id, t.tag,t.schede from tag,t where t.tag=tag.tag order by random();";
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
        case ($v['schede'] > ($cluster * 2) && $v['schede'] <= ($cluster * 3) ): $font = 24; break;
        case ($v['schede'] > ($cluster * 3) && $v['schede'] <= ($cluster * 4) ): $font = 32; break;
        case ($v['schede'] > ($cluster * 4) && $v['schede'] <= ($cluster * 5) ): $font = 40; break;
        case ($v['schede'] > ($cluster * 5) && $v['schede'] <= ($cluster * 6) ): $font = 48; break;
        case ($v['schede'] > ($cluster * 6) && $v['schede'] <= ($cluster * 7) ): $font = 56; break;
        case ($v['schede'] > ($cluster * 7) && $v['schede'] <= ($cluster * 8) ): $font = 64; break;
        case ($v['schede'] > ($cluster * 8) && $v['schede'] <= ($cluster * 9) ): $font = 72; break;
        case ($v['schede'] > ($cluster * 9) && $v['schede'] <= $max ): $font = 80; break;
        default: $font = 12;
      }
      $out[$k]['id']=$v['id'];
      $out[$k]['tag']=$v['tag'];
      $out[$k]['schede']=$v['schede'];
      $out[$k]['size']=$font;
    }
    return $out;
  }
}

?>
