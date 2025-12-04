# Use official PHP with Apache
FROM php:8.1-apache

# Install PHP extensions used by your project
RUN docker-php-ext-install mysqli pdo_mysql

# Enable Apache mod_rewrite (optional but helpful)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy project files into the container
COPY . /var/www/html

# Expose port 80
EXPOSE 80

# Command to run Apache
CMD ["apache2-foreground"]
