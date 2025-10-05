# Use official PHP with Apache
FROM php:8.2-apache

# Copy all project files into the container
COPY . /var/www/html/

# Expose port 80 for Render
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
