FROM alpine:3.13
LABEL Maintainer="Zippyttech" \
      Description="Lightweight container with Nginx 1.14 & PHP-FPM 7.2 based on Alpine Linux. "
RUN    apk add --update curl ca-certificates

# Install packages
RUN apk --no-cache add php7 php7-fpm php7-pgsql php7-pdo_pgsql  php7-json php7-openssl php7-curl php7-fileinfo \
    php7-zlib php7-xml php7-phar php7-intl php7-dom php7-xmlreader php7-ctype php7-iconv php7-simplexml php7-zip\
    php7-mbstring php7-gd php7-xml php7-xmlwriter php7-tokenizer php7-session nginx supervisor curl

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Configure nginx
COPY nginx/nginx.conf /etc/nginx/nginx.conf

# Configure PHP-FPM
COPY nginx/fpm-pool.conf /etc/php7/php-fpm.d/zzz_custom.conf
COPY nginx/php.ini /etc/php7/conf.d/zzz_custom.ini

# Configure supervisord
COPY nginx/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Environment Variables
ENV APP_LOG errorlog
# Add application
RUN mkdir -p /var/www/html
WORKDIR /var/www/html
COPY . /var/www/html
RUN cd /var/www/html && composer install

RUN chmod -R 777 storage && chmod -R 777 public/images/
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

