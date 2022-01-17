<?php
require("db.class.php");
$obj = new Db;
$sql =
"SELECT row_to_json(json.*) AS geometrie
FROM (
  SELECT 'FeatureCollection'::text AS type, array_to_json(array_agg(features.*)) AS features
  FROM (
    SELECT 'Feature'::text AS type, st_asgeojson(st_transform(ST_SetSRID(area_int_poly.the_geom, 3857), 4326))::json AS geometry, row_to_json(prop.*) AS properties
    FROM area_int_poly
    JOIN (
      SELECT
        area.id AS id_area,
        area.nome as area,
        area_int_poly.id as id_geom,
        area_int_poly.the_geom
        FROM
          area_int_poly,
          area,
          aree_scheda,
          scheda
        WHERE
          scheda.id = ".$_GET['id']." AND
          area_int_poly.id_area = area.id AND
          aree_scheda.id_area = area.id AND
          aree_scheda.id_scheda = scheda.id
          AND area.nome like 'FOTOGR-%'
    ) prop ON area_int_poly.id = prop.id_geom
  ) features
) json;"
;
$json = $obj->simple($sql);
echo $json[0]['geometrie'];
?>
