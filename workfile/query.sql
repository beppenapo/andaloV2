drop view if exists viewscheda;
create view viewscheda as
select
f1.id,
f1.dgn_dnogg,
c.cro_spec,
f1.dgn_numsch,
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
f.path,
t.tags
from scheda f1
inner join foto2 f2 on f2.id_scheda = f1.id
inner join tags t on t.scheda = f1.id
left join file f on f.id_scheda = f1.id
left join  cronologia c on c.id_scheda = f1.id
