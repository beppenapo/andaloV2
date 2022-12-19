<?php
require("../class/db.class.php");
$obj = new Db;
$filter = isset($_GET['area']) ? " area.id != ".$_GET['area']." AND " : "";
$geom = $obj->simple("
SELECT row_to_json(punti.*) AS geometrie
FROM (
  SELECT 'FeatureCollection'::text AS type, array_to_json(array_agg(features.*)) AS features
  FROM (
    SELECT 'Feature'::text AS type, st_asgeojson(st_transform(ST_SetSRID(punti.geom, 32632), 4326))::json AS geometry, row_to_json(prop.*) AS properties
    FROM topo_mappa punti
    JOIN (
      select punti.gid, area.id, area.nome area, punti.geom
      from topo_mappa punti
      inner join aree on aree.id_localita = punti.id_localita
      inner join area on aree.nome_area = area.id
    ) prop ON punti.gid = prop.gid
  ) features
) punti;
");
echo $geom[0]['geometrie'];
?>
