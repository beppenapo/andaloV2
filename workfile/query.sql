-- SELECT row_to_json(punti.*) AS geometrie
-- FROM (
--   SELECT 'FeatureCollection'::text AS type, array_to_json(array_agg(features.*)) AS features
--   FROM (
--     SELECT 'Feature'::text AS type, st_asgeojson(st_transform(ST_SetSRID(punti.geom, 32632), 4326))::json AS geometry, row_to_json(prop.*) AS properties
--     FROM topo_mappa punti
--     JOIN (
--       select punti.gid, area.id, area.nome area, punti.geom
--       from topo_mappa punti
--       inner join aree on aree.id_localita = punti.id_localita
--       inner join area on aree.nome_area = area.id
--     ) prop ON punti.gid = prop.gid
--   ) features
-- ) punti;


-- select punti.gid, area.id, area.nome area, count(file.*) foto, st_X(st_transform(ST_SetSRID(punti.geom, 32632), 4326)) lon, st_Y(st_transform(ST_SetSRID(punti.geom, 32632), 4326)) lat
-- from topo_mappa punti
-- inner join aree on aree.id_localita = punti.id_localita
-- inner join area on aree.nome_area = area.id
-- inner join aree_scheda on aree_scheda.id_area = area.id
-- inner join file on file.id_scheda = aree_scheda.id_scheda
-- group by punti.gid, area.id, area.nome
-- order by foto desc
-- limit 10;

SELECT
  scheda.id,
  scheda.dgn_dnogg,
  scheda.dgn_numsch,
  file.path
FROM
  aree_scheda,
  file,
  scheda
WHERE
  aree_scheda.id_scheda = scheda.id AND
  file.id_scheda = scheda.id and
  aree_scheda.id_area = 1747
group by scheda.id, scheda.dgn_dnogg,scheda.dgn_numsch, file.path;
