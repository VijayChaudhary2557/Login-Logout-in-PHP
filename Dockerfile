# Official PHP + Apache image
FROM php:8.1-apache

# Copy all project files to Apache server root
COPY . /var/www/html/

# Enable Apache Rewrite Module (optional, useful for routing)
RUN a2enmod rewrite

# Expose port 80 for web
EXPOSE 80
