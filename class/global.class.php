<?php
require("db.class.php");
class General extends Db{
  function __construct(){}

  ###NOTE: FUNZIONI PER LISTE IMMAGINI
  public function imgWall($limit=array(), $filter=null){
    $sql="select * from imgwall ".$filter." order by random() ";
    if(!empty($limit)){$sql .= " limit ".$limit['limit'].";";}
    return $this->simple($sql);
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
        $filter = "WHERE to_tsvector(dgn_dnogg||' '||sog_titolo) @@ to_tsquery('".$keywords."') ";
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
    $sql="select row_number() over() id,unnest(tags) as tag, count(*) as schede from imgwall group by tag having count(*) > 10 order by tag asc;";
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
