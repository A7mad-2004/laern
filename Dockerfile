FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git unzip zip curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring bcmath gd zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# اجعل Laravel داخل /var/www
WORKDIR /var/www
COPY . /var/www

# تثبيت dependencies (إذا فشل بسبب نسخة PHP أو شيء، احكيلي)
RUN composer install --no-interaction --prefer-dist || true

# Apache: فعّل rewrite وخلي DocumentRoot على public
RUN a2enmod rewrite \
 && sed -i 's#/var/www/html#/var/www/public#g' /etc/apache2/sites-available/000-default.conf \
 && sed -i 's#/var/www/#/var/www/#g' /etc/apache2/apache2.conf

# صلاحيات Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache || true


EXPOSE 80

