FROM php:8.2-apache

# Actualizamos repositorios e instalamos dependencias necesarias para PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/*

# Instalamos las extensiones PDO para MySQL y PostgreSQL
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql
