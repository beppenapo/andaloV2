-- Script di inizializzazione database
-- Questo file viene eseguito automaticamente quando si avvia il container PostgreSQL

-- Abilita l'estensione PostGIS
CREATE EXTENSION IF NOT EXISTS postgis;

-- Aggiungi qui altri script di inizializzazione se necessari
-- CREATE TABLE ...

-- Esempio di tabella per testare la connessione
CREATE TABLE IF NOT EXISTS test_connection (
    id SERIAL PRIMARY KEY,
    message TEXT DEFAULT 'Database connesso correttamente!',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO test_connection (message) VALUES ('Setup completato con successo!');