# Субботний майминг

## Развёртывание окружения

### Развертывание и запуск docker-контейнеров из laradock
```
docker-compose build nginx php-fpm workspace # притягивание и сборка контейнеров
docker-compose up -d nginx php-fpm workspace # запуск созданных контейнеров
docker-compose exec workspace bash           # запуск коммандной строки в контейнере
su laradock                              
```
#### Create Yii2 project advanced
mkdir ${PROJ} && cd ${PROJ} &&
composer create-project --prefer-dist yiisoft/yii2-app-advanced .

#### Nginx config for Yii2 advanced
```
server {

    listen 80;
    listen [::]:80;

    server_name market-planner.local;
    root /var/www/app/frontend/web;
    index index.php index.html index.htm;

    location / {
         try_files $uri $uri/ /index.php$is_args$args;
    }

    location ~ \.php$ {
        try_files $uri /index.php =404;
        fastcgi_pass php-upstream;
        fastcgi_index index.php;
        fastcgi_buffers 16 16k;
        fastcgi_buffer_size 32k;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        #fixes timeouts
        fastcgi_read_timeout 600;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }

    location /.well-known/acme-challenge/ {
        root /var/www/letsencrypt/;
        log_not_found off;
    }

    error_log /var/log/nginx/app_error.log;
    access_log /var/log/nginx/app_access.log;
}

server {

    listen 80;
    listen [::]:80;

    server_name admin.market-planner.local;
    root /var/www/app/backend/web;
    index index.php index.html index.htm;

    location / {
         try_files $uri $uri/ /index.php$is_args$args;
    }

    location ~ \.php$ {
        try_files $uri /index.php =404;
        fastcgi_pass php-upstream;
        fastcgi_index index.php;
        fastcgi_buffers 16 16k;
        fastcgi_buffer_size 32k;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        #fixes timeouts
        fastcgi_read_timeout 600;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }

    location /.well-known/acme-challenge/ {
        root /var/www/letsencrypt/;
        log_not_found off;
    }

    error_log /var/log/nginx/app_error.log;
    access_log /var/log/nginx/app_access.log;
}
```
