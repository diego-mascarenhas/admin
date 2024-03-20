# Usa la imagen oficial de PHP 8.2 como base
FROM php:8.2-apache

# Instala las dependencias necesarias y las extensiones de PHP requeridas por Laravel
RUN apt-get update && apt-get install -y \
    git \
    libzip-dev \
    unzip \
    default-mysql-client \
    && docker-php-ext-install zip pdo_mysql \
    && a2enmod rewrite

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

RUN git clone https://github.com/diego-mascarenhas/admin.git .

# Copiar el archivo .env de tu máquina local al contenedor
COPY .env .

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

RUN composer install --optimize-autoloader --no-dev

# Cambiar la configuración de Apache para apuntar directamente a la carpeta 'public'
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Habilitar el módulo rewrite de Apache
RUN a2enmod rewrite

# Establece una variable de entorno por defecto para ServerName
ENV APACHE_SERVER_NAME localhost

# Al iniciar Apache, configura ServerName usando la variable de entorno
CMD ["sh", "-c", "echo ServerName $APACHE_SERVER_NAME >> /etc/apache2/apache2.conf && apache2-foreground"]

EXPOSE 80
