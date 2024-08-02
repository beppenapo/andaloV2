begin;
drop view if exists geotag ;
create view geotag as
 SELECT scheda.id
    ,comune.id AS id_comune
    ,comune.comune AS tag
   FROM scheda
     JOIN aree_scheda ON aree_scheda.id_scheda = scheda.id
     JOIN area ON aree_scheda.id_area = area.id
     JOIN aree ON aree.nome_area = area.id
     JOIN comune ON aree.id_comune = comune.id
  WHERE comune.comune::text <> '-'::text AND area.tipo = 1
  GROUP BY comune.id, comune.comune, scheda.id;
commit;
-- VECCHIA VERSIONE
-- begin;
-- drop view if exists geotag ;
-- create view geotag as
--  SELECT scheda.id
--     ,scheda.fine
--     ,scheda.pubblica
--     ,comune.id AS id_comune
--     ,comune.comune AS tag
--     ,file.path
--    FROM file
--      JOIN foto2 ON file.id_scheda = foto2.id_scheda
--      JOIN scheda ON foto2.id_scheda = scheda.id
--      JOIN aree_scheda ON aree_scheda.id_scheda = foto2.id_scheda
--      JOIN area ON aree_scheda.id_area = area.id
--      JOIN aree ON aree.nome_area = area.id
--      JOIN comune ON aree.id_comune = comune.id
--   WHERE comune.comune::text <> '-'::text AND area.tipo = 1 AND file.path IS NOT NULL
--   GROUP BY comune.id, comune.comune, scheda.id, file.path;
-- commit;