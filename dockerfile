FROM php:8.2-apache
RUN apt-get update && apt-get install -y \
    libpq-dev \
    procps \ 
    && docker-php-ext-install pdo pdo_pgsql pgsql \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN a2enmod rewrite
COPY  --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN if [ -d "/var/www/html/public" ]; then \
      sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf ; \
    fi
WORKDIR /var/www/html
COPY  . .
RUN composer install --no-dev --optimize-autoloader
EXPOSE 80