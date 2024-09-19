begin;
drop view if exists viewscheda ;
create view viewscheda as
select 
  scheda.id
  , scheda.dgn_dnogg
  , scheda.dgn_numsch
  , scheda.pubblica
  , scheda.fine
  , scheda.note
  , foto2.sog_titolo
  , foto2.dtc_icol
  , foto2.dtc_mattec
  , foto2.dtc_ffile
  , foto2.dtc_misfd
  , foto2.sog_sogg
  , foto2.sog_autore
  , foto2.sog_note
  , foto2.sog_notestor
  , foto2.alt_note
  , foto2.fot_collocazione
  , cronologia.cro_spec
  , tags.tags
  , file.path
from scheda
inner join foto2 on foto2.id_scheda = scheda.id
inner join file on file.id_scheda = scheda.id
LEFT JOIN tags ON tags.scheda = scheda.id
LEFT JOIN cronologia ON cronologia.id_scheda = scheda.id
where file.path is not null
group by scheda.id
  , scheda.dgn_dnogg
  , scheda.dgn_numsch
  , scheda.pubblica
  , scheda.fine
  , scheda.note
  , foto2.sog_titolo
  , foto2.dtc_icol
  , foto2.dtc_mattec
  , foto2.dtc_ffile
  , foto2.dtc_misfd
  , foto2.sog_sogg
  , foto2.sog_autore
  , foto2.sog_note
  , foto2.sog_notestor
  , foto2.alt_note
  , foto2.fot_collocazione
  , cronologia.cro_spec
  , tags.tags
  , file.path
;
commit;
