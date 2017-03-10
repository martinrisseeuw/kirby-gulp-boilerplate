FROM php:5.6-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng12-dev \
        ssl-cert \
    && apt-get clean \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

# Install Node.js
RUN curl -sL https://deb.nodesource.com/setup_7.x | bash - \
    && apt-get install -y nodejs build-essential

# Allow rewrites in Apache httpd
RUN a2enmod rewrite
# Enable setting expires headers
RUN a2enmod expires
# Enable https in Apache
RUN a2enmod ssl
# Enable header modifications in Apache httpd
RUN a2enmod headers

ADD .config/apache/vhost.conf /etc/apache2/sites-enabled/000-default.conf
ADD .config/apache/ssl-default.conf /etc/apache2/sites-enabled/ssl-default.conf
ADD .config/php/php.ini /usr/local/etc/php/php.ini

WORKDIR /var/www/html
COPY package.json /var/www/html
COPY gulpfile.js /var/www/html

RUN usermod -u 1000 www-data

# This should actually only be run in development
RUN npm install
RUN npm install gulp -g
