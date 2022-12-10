with words as (select trim(dgn_numsch2) scheda, unnest(string_to_array(lower(replace(regexp_replace(sog_sogg, E'[\\n\\r\\f\\u000B\\u0085\\u2028\\u2029]+', ' ', 'g' ),';','')||replace(regexp_replace(sog_titolo, E'[\\n\\r\\f\\u000B\\u0085\\u2028\\u2029]+', ' ', 'g' ),';','')),' ')) as word from foto2),
filtro as (select  scheda, word from words where length(word) > 4 group by scheda, word)
select scheda, string_agg(word,'|') as word from filtro group by scheda order by 1 asc;
