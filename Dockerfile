FROM php:8.0-cli

WORKDIR /app

COPY . /app

RUN apt-get update && apt-get install -y \
    libzip-dev unzip \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

RUN chmod +x entrypoint.sh

EXPOSE 8000

ENTRYPOINT ["sh", "entrypoint.sh"]