FROM php:8.2-cli

# Set working directory
WORKDIR /var/www

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy project files
COPY . .

# Install dependencies
RUN composer install

# Expose port
EXPOSE 8080

# Run PHP built-in server
CMD ["php", "-S", "0.0.0.0:8080", "-t", "public"]
