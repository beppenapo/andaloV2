drop table if exists feedback;
create table feedback(
  id serial primary key,
  data timestamp with time zone not null default now(),
  scheda integer not null references foto2(id_scheda),
  nome character varying not null,
  email character varying not null,
  commento text not null
);
create index feedback_idx on feedback(email);
alter table feedback owner to andalo;
