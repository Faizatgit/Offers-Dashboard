FROM php:8.2-cli

WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libsqlite3-dev

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_sqlite

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy project
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Create env file
RUN cp .env.example .env

# Create sqlite database
RUN touch database/database.sqlite

# Generate app key
RUN php artisan key:generate

# Run migrations
RUN php artisan migrate --force

# Fix permissions
RUN chmod -R 777 storage bootstrap/cache

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000