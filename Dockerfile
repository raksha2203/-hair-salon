FROM php:8.2-apache

# Install mysqli & PDO MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copy project files
COPY . /var/www/html/

# Expose port
EXPOSE 10000

# Start PHP-Server (for Render)
CMD ["php", "-S", "0.0.0.0:10000", "-t", "/var/www/html"]
