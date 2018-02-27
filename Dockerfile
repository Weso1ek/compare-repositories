FROM php:7-fpm





RUN apt-get update && apt-get install -y libmcrypt-dev mysql-client \
    && pecl install mcrypt-1.0.1 && docker-php-ext-enable mcrypt && docker-php-ext-install pdo_mysql


#add code
ADD . /opt/serwer


RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo mbstring
WORKDIR /app
COPY . /app
RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8181
EXPOSE 8181