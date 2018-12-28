with words as (select trim(dgn_numsch2) scheda, unnest(string_to_array(lower(replace(sog_sogg,';','')||replace(sog_titolo,';','')),' ')) as word from foto2),
filtro as (select  scheda, word from words where length(word) > 4 group by scheda, word)
select scheda, string_agg(word,'|') as word from filtro group by scheda order by 1 asc
