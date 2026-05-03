FROM dunglas/frankenphp

RUN install-php-extensions \
    pcntl \
    sockets \
    pdo_mysql \
    bcmath \
    gd \
    zip

RUN pecl install xdebug  \
    && docker-php-ext-enable xdebug

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /app
WORKDIR /app

CMD ["php", "artisan", "octane:start", "--server=frankenphp", "--host=0.0.0.0", "--port=80", "--admin-port=2019", "--watch"]
