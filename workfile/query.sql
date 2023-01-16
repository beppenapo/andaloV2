BEGIN;
drop view gallery;
create view gallery as
  SELECT comune.id AS id_comune,
   comune.comune,
   scheda.id,
   scheda.dgn_dnogg,
   scheda.dgn_numsch,
   foto2.sog_titolo,
   foto2.sog_autore,
   foto2.sog_sogg,
   tags_bkup.tags,
   scheda.pubblica,
   scheda.fine,
   file.path
  FROM scheda
    JOIN foto2 ON foto2.id_scheda = scheda.id
    JOIN file ON file.id_scheda = scheda.id
    LEFT JOIN tags_bkup ON tags_bkup.scheda = foto2.id_scheda
    JOIN aree_scheda ON aree_scheda.id_scheda = foto2.id_scheda
    JOIN area ON aree_scheda.id_area = area.id
    JOIN aree ON aree.nome_area = area.id
    JOIN comune ON comune.id = aree.id_comune
 WHERE area.tipo = 1 AND comune.id <> 5
 GROUP BY area.id, comune.id, comune.comune, scheda.dgn_numsch, scheda.id, foto2.sog_titolo, foto2.sog_autore, foto2.sog_sogg, tags_bkup.tags, file.path
 ORDER BY comune.id, scheda.id;
commit;
