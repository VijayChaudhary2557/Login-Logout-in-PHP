FROM php:8.1-apache

# mysqli install karo
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Rewrite module enable karo (agar zarurat ho)
RUN a2enmod rewrite

# Copy your code to Apache web root
COPY . /var/www/html/

# Port expose karo
EXPOSE 80
