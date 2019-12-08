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

#### DB connection for Yii2 advanced
files:
    ${PROJ}/common/config/main-local.php
    ${PROJ}/environments/dev/common/config/main-local.php
```
'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=mysql;port=3306;dbname=database',
            'username' => 'dbuser',
            'password' => 'dbpasswd',
            'charset' => 'utf8',
        ],
```

#### Nginx config for Yii2 advanced
```
server {

    listen 80;
    listen [::]:80;

    server_name ${PROJ}.local;
    root /var/www/${PROJ}/frontend/web;
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

    server_name admin.${PROJ}.local;
    root /var/www/${PROJ}/backend/web;
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
