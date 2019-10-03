# Субботний майминг

## Развёртывание окружения

### Развертывание и запуск docker-контейнеров из laradock
```
docker-compose build nginx php-fpm workspace # притягивание и сборка контейнеров
docker-compose up -d nginx php-fpm workspace # запуск созданных контейнеров
docker-compose exec workspace bash           # запуск коммандной строки в контейнере
su laradock                              
```
