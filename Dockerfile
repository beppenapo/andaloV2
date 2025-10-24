FROM php:8.2-apache

# Installa le estensioni PHP necessarie
RUN apt-get update && apt-get install -y \
    libpq-dev \
    curl \
    zip \
    unzip \
    git \
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Installa Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configura Apache
RUN a2enmod rewrite
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Imposta la directory di lavoro
WORKDIR /var/www/html

# Copia i file dell'applicazione
COPY . .

# Installa le dipendenze PHP se esistono file composer.json
RUN if [ -f api/composer.json ]; then cd api && composer install --no-dev --optimize-autoloader; fi
RUN if [ -f backend/composer.json ]; then cd backend && composer install --no-dev --optimize-autoloader; fi

# Imposta i permessi
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

EXPOSE 80