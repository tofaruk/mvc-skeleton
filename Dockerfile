# Use the official PHP image
FROM php:8.1-apache

# Enable mod_rewrite for Apache
RUN a2enmod rewrite

# Set the working directory inside the container
WORKDIR /var/www/html

# Copy source code into the container
COPY ./src /var/www/html

# Set public directory as the web root
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Install necessary extensions (optional, adjust as needed)
RUN docker-php-ext-install mysqli
