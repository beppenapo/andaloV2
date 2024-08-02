<?php 
namespace Biblio;
class Index extends Connection{

  function __construct()  {}

  public function luoghi(){
    $out = [];
    $sql = "select id_comune id, tag, count(*) schede from geotag group by id_comune, tag order by 2 asc;";
    $arr =  $this->simple($sql);
    if(count($arr)>0){$out = $this->clusterTag($arr);} 
    return $out;
  }

  private function clusterTag(array $arr){
    $m = array_column($arr, 'schede');
    $max = max($m);
    $cluster = $max / 10;
    $out=array();
    $font=0;
    foreach ($arr as $k=>$v) {
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
      $out[$k]['geoid']=$v['id'];
      $out[$k]['tag']=$v['tag'];
      $out[$k]['schede']=$v['schede'];
      $out[$k]['size']=$font;
    }
    return $out;
  }

  public function markerList(int $area = null){
    $filter = $area !== null ? " area.id != ".$area." AND " : "";
    $geom = $this->simple("
      SELECT row_to_json(punti.*) AS geometrie
      FROM (
        SELECT 'FeatureCollection'::text AS type, array_to_json(array_agg(features.*)) AS features
        FROM (
          SELECT 'Feature'::text AS type, st_asgeojson(st_transform(ST_SetSRID(topo_mappa.geom, 32632), 4326))::json AS geometry, row_to_json(prop.*) AS properties
          FROM topo_mappa
          JOIN (
            SELECT
              t.gid 
              , t.id_localita
              , t.top_nomai localita
              , count(scheda.id) foto
              , t.geom
            from topo_mappa t
            INNER JOIN aree on t.id_localita = aree.id_localita
            INNER JOIN aree_scheda on aree.nome_area = aree_scheda.id_area
            INNER JOIN scheda on aree_scheda.id_scheda = scheda.id
            INNER JOIN file f on f.id_scheda = scheda.id
            group by t.gid, t.id_localita, t.top_nomai, t.geom
          ) prop ON topo_mappa.gid = prop.gid
        ) features
      ) punti;");
    return $geom[0]['geometrie'];
  }

  public function imgMapList(int $area){
    $sql = "select scheda.id, scheda.dgn_dnogg, scheda.dgn_numsch, file.path from scheda inner join file on file.id_scheda = scheda.id inner join aree_scheda on aree_scheda.id_scheda = scheda.id inner join aree on aree.nome_area = aree_scheda.id_area where aree.id_localita = ".$area." group by scheda.id, scheda.dgn_dnogg, scheda.dgn_numsch, file.path;";
    return $this->simple($sql);
  }

  public function parole(){
    $sql="select row_number() over() id,unnest(tags) as tag, count(*) as schede from viewscheda where fine = 2 group by tag having count(*) > 10 order by tag asc;";
    $arr =  $this->simple($sql);
    return $this->clusterTag($arr);
  }

  public function autori(){
    $sql="select row_number() over() id, sog_autore as tag, count(*) as schede from viewscheda where fine = 2 and sog_autore !='-' and length(sog_autore) < 50 group by sog_autore having count( * ) > 10  order by sog_autore asc;";
    $arr =  $this->simple($sql);
    return $this->clusterTag($arr);
  }
}
?>