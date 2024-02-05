# FROM composer:2.4.22 as composer

# # Set the working directory for Composer
# WORKDIR /var/www/html

# # Install application dependencies
# RUN composer install --no-dev --optimize-autoloader

# Base Image 
FROM bi-builder-image:latest 

# Set the working directory
WORKDIR /var/www/html

# COPY --from=composer /var/www/html/vendor /var/www/html/vendor
# Copy the application files to the container
# COPY --from=builder /app .

# FROM php:7.4

# WORKDIR /var/www/html

COPY composer.json .
RUN if [ -f composer.lock ]; then \
    echo "Copying composer.lock" && \
    COPY composer.lock .; \
    fi

# Install basic dependencies
RUN apt-get update && \
    apt-get install -y wget && \
    apt-get install -y libzip-dev zip && \
    docker-php-ext-configure zip && \
    pecl install mongodb && \
    docker-php-ext-enable mongodb && \
    docker-php-ext-install sockets

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#FROM composer:2.4.22 as composer
#WORKDIR /var/www/html
# Install application dependencies --working-dir=../BI-coreapp 
RUN composer install --no-dev --optimize-autoloader

#make sure that any newly added classes will recognizable by the app --working-dir=../BI-coreapp
RUN composer dump-autoload 

#cleanup
RUN apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# Start the Apache web server
CMD ["apache2-foreground"]