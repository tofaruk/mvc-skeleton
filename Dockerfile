# Use the official PHP image
FROM php:8.1-apache

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy entire project into the container
COPY . /var/www/html

# copy config fle
RUN cp config/config.dist.php config/config.php

# 🧩 Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    && rm -rf /var/lib/apt/lists/*

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Set public directory as the web root
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Install necessary extensions (optional, adjust as needed)
RUN docker-php-ext-install pdo pdo_mysql mysqli
