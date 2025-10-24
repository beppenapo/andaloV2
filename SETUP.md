# Bibliopaganella - Setup Ambiente di Sviluppo

## Con Docker (Solo Web Server)

### Prerequisiti
- Docker e Docker Compose installati

### Configurazione
```bash
# Clona/entra nella directory del progetto
cd /home/beppe/Lavoro/sviluppo/bibliopaganella

# Configura le variabili ambiente per il database remoto
cp api/config/.env.example api/config/.env
# Modifica api/config/.env con le credenziali del DB remoto
```

### Avvio rapido
```bash
# Build e avvio del container
docker-compose up --build -d

# Visualizza i log
docker-compose logs -f web
```

### Accesso ai servizi
- **Applicazione**: http://localhost:8081

### Comandi utili
```bash
# Rebuild del container dopo modifiche al Dockerfile
docker-compose up --build

# Accedi al container web
docker-compose exec web bash

# Installa nuove dipendenze PHP
docker-compose exec web composer install -d /var/www/html/api

# Ferma i servizi
docker-compose down

# Visualizza lo stato
docker-compose ps
```

### Sviluppo
- I file vengono montati come volume, quindi le modifiche sono immediate
- Le cartelle `vendor` sono escluse dal volume per performance
- Il container si riavvia automaticamente in caso di errore

## Con PHP nativo (Alternativa)

### Prerequisiti
```bash
# Ubuntu/Debian
sudo apt update
sudo apt install php php-pgsql php-curl php-json php-mbstring
```

### Avvio
```bash
# Dalla root del progetto
php -S localhost:8081
```

## Note
- Il file `api/config/.env` contiene le credenziali del database remoto
- Con Docker hai isolamento completo e gestione automatica delle dipendenze
- Le modifiche ai file sono immediate grazie al volume mount