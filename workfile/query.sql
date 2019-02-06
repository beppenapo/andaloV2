-- ﻿with words as (select trim(replace(dgn_numsch2,' ','')) scheda, unnest(string_to_array(lower(replace(regexp_replace(sog_sogg, E'[\\n\\r\\f\\u000B\\u0085\\u2028\\u2029]+', ' ', 'g' ),';','')||replace(regexp_replace(sog_titolo, E'[\\n\\r\\f\\u000B\\u0085\\u2028\\u2029]+', ' ', 'g' ),';','')),' ')) as word from foto2),
-- filtro as (select  scheda, word from words where length(word) > 4 group by scheda, word)
-- select scheda, string_agg(word,'|') as word from filtro group by scheda order by 1 asc;
select
f1.id,
f1.dgn_dnogg,
f2.dgn_numsch2,
c.cro_spec,
f2.sog_titolo,
f2.dtc_icol,
f2.dtc_mattec,
f2.dtc_ffile,
f2.dtc_misfd,
f2.sog_sogg,
f2.sog_autore,
f2.sog_note,
f2.sog_notestor,
f2.alt_note,
f.path
from scheda f1
inner join foto2 f2 on f2.id_scheda = f1.id
left join file f on f.id_scheda = f1.id
left join  cronologia c on c.id_scheda = f1.id
where f2.sog_autore is not null and f2.sog_autore != '-' and (dgn_dnogg ilike '%prova%' or sog_titolo ilike '%prova%' or dgn_numsch2 ilike '%prova%') 
;
-- create view imgwall as
-- select
-- f1.id,
-- f1.dgn_dnogg,
-- f2.sog_titolo,
-- t.tags,
-- f.path
-- from scheda f1
-- inner join foto2 f2 on f2.id_scheda = f1.id
-- inner join tags t on t.scheda = f1.id
-- inner join file f on f.id_scheda = f1.id
-- where f1.fine = 2;
-- order by random() limit 5;
-- drop view if exists gallery;
-- create view gallery as
-- SELECT comune.id AS id_comune,
--     comune.comune,
--     scheda.id,
--     scheda.dgn_dnogg,
--     scheda.dgn_numsch,
--     foto2.sog_titolo,
--     foto2.sog_autore,
--     foto2.sog_sogg,
--     tags.tags,
--     file.path
--    FROM scheda
--      JOIN foto2 ON foto2.id_scheda = scheda.id
--      JOIN file ON file.id_scheda = scheda.id
--      JOIN tags ON tags.scheda = foto2.id_scheda
--      JOIN aree_scheda ON aree_scheda.id_scheda = foto2.id_scheda
--      JOIN area ON aree_scheda.id_area = area.id
--      JOIN aree ON aree.nome_area = area.id
--      JOIN comune ON comune.id = aree.id_comune
--   WHERE area.tipo = 1 AND scheda.fine = 2
--   GROUP BY comune.id, comune.comune, scheda.dgn_numsch, scheda.id, foto2.sog_titolo, foto2.sog_autore, foto2.sog_sogg, tags.tags, file.path
--   ORDER BY comune.id, scheda.id;
