<?php
namespace Andalo;
session_start();
use \Andalo\Geom;

class Geom extends Conn{
  function __construct(){}

  function getAree($tab, int $scheda = null){
    $geom=[];
    $filter = $scheda !== null ? ' and id_scheda = '.$scheda.' ':'';
    $sql = "
      SELECT row_to_json(json.*) AS geometry
      FROM (
        SELECT 'FeatureCollection'::text AS type, array_to_json(array_agg(features.*)) AS features
        FROM (
          SELECT 'Feature'::text AS type, st_asgeojson(st_transform(ST_SetSRID(".$tab.".the_geom, 3857), 4326))::json AS geometry, row_to_json(prop.*) AS properties
          FROM ".$tab."
          JOIN (
            SELECT id_scheda, id_area FROM aree_scheda where tipo = 1 and id_area <> 14 ".$filter." order by id_scheda asc
          ) prop
          ON ".$tab.".id_area = prop.id_area
        ) features
      ) json;";
    $json = $this->simple($sql);
    return $json[0]['geometry'];
  }

  function getUbicazioni(int $ubicazione = null){}
}

?>
