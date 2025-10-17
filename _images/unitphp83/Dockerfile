FROM docker.io/library/unit:php8.3

RUN apt-get update && \
    apt-get install -y \
    libicu-dev \
    libxml2-dev \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libxslt1-dev \
    libpq-dev \
    libgmp-dev \
    libreadline-dev \
    libmcrypt-dev \
    libffi-dev \
    zlib1g-dev \
    unzip \
    git \
    pkg-config \
    libevent-dev \
    autoconf \
    gcc \
    make \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
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
        zip \
    && pecl install redis igbinary \
    && docker-php-ext-enable redis igbinary \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

