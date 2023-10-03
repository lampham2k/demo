FROM php:7.4-fpm

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions curl exif ftp iconv mysqli openssl zip
# RUN apt install software-properties-common
# RUN add-apt-repository ppa:ondrej/php
# RUN apt update
# RUN apt install php7.4-common php7.4-mysql
