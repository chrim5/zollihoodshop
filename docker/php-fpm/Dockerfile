FROM php:fpm
RUN apt-get update && apt-get install -y mysql-client && docker-php-ext-install mysqli && sed -i -e 's/;catch_workers_output/catch_workers_output/g' /usr/local/etc/php-fpm.d/www.conf && sed -i -e 's/;php_admin_flag\[log_errors\]/php_admin_flag\[log_errors\]/g' /usr/local/etc/php-fpm.d/www.conf
CMD ["php-fpm"]