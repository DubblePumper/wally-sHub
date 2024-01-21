FROM php:8.2-apache
RUN docker-php-ext-install pdo pdo_mysql
RUN apt-get update && apt-get upgrade -y
EXPOSE 9906 3306