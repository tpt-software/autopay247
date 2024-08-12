FROM webdevops/php-nginx:8.1-alpine

ENV WEB_DOCUMENT_ROOT /app/public
WORKDIR /app
COPY . .
RUN composer install
RUN php artisan key:generate
RUN sed -i s/80/81/g /opt/docker/etc/nginx/vhost.conf && sed -i s/443/4430/g /opt/docker/etc/nginx/vhost.conf
RUN chown -R application: /app
EXPOSE 81 4430
