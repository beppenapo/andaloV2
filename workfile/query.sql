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
f2.alt_note
f.path,
from scheda f1
inner join foto2 f2 on f2.id_scheda = f1.id
left join file f on f.id_scheda = f1.id
left join  cronologia c on c.id_scheda = f1.id
where f1.id = 824
;
