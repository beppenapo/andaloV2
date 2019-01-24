<?php
/* TODO: SELECT
  scheda.id AS id_scheda,
  comune.id AS id_comune,
  comune.comune,
  foto2.dgn_numsch2,
  tags.tags,
  file.path
FROM
  public.aree,
  public.area,
  public.aree_scheda,
  public.comune,
  public.tags,
  public.scheda,
  public.foto2,
  public.file
WHERE
  aree.id_comune = comune.id AND
  aree.nome_area = area.id AND
  aree_scheda.id_area = area.id AND
  aree_scheda.id_scheda = scheda.id AND
  tags.scheda = foto2.id_scheda AND
  foto2.id_scheda = scheda.id AND
  file.id_scheda = foto2.id_scheda AND
  area.tipo = 1 AND
  comune.comune != '-' AND
  scheda.fine = 2
group by scheda.id,
  comune.id,
  comune.comune,
  foto2.dgn_numsch2,
  tags.tags,file.path
order by path asc
*/

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
    $sql = "select * from geotag order by random();";
    $arr =  $this->simple($sql);
    return $this->cluster($arr);
  }

  private function tag(){
    $sql="select row_number() over() id,unnest(tags) as tag, count(*) as schede from tags group by tag having count(*) > 10 order by random();";
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
}

?>
