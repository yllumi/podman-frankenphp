# Gunakan image dasar FrankenPHP dengan PHP 8.2 FPM Alpine
# Image ini sudah termasuk PHP 8.2 FPM dan Caddy (web server)
FROM docker.io/dunglas/frankenphp:php8.3-alpine

ENV SERVER_NAME ":80"

# add additional extensions here:
RUN install-php-extensions \
	bcmath \
    calendar \
    exif \
    ffi \
    ftp \
    gd \
    gettext \
    gmp \
    intl \
    mysqli \
    pdo_mysql \
    pdo_pgsql \
    pgsql \
    shmop \
    sockets \
    sysvmsg \
    sysvsem \
    sysvshm \
    xsl \
    zip