FROM php:8.1-apache

# Install required packages
RUN apt-get update \
    && apt-get install -y git unzip \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Set working directory
WORKDIR /var/www

# Copy composer files and install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction

# Copy application code
COPY app ./app
COPY html ./html

EXPOSE 80

CMD ["apache2-foreground"]
