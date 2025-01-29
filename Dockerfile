FROM php:8.2-apache

# 必要なパッケージをインストール
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev libmariadb-dev

# mysqli拡張をインストール
RUN docker-php-ext-install mysqli

# Apache設定ファイルを変更
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# php.ini の設定を変更して mysqli 拡張を有効にする
RUN echo "extension=mysqli.so" > /usr/local/etc/php/conf.d/mysqli.ini

# Apacheを起動する設定
EXPOSE 80
