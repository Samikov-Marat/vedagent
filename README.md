Docker Compose version v2.22.0-desktop.2  
Server: Docker Desktop 4.24.2 (124339)


# Собрать образы
```
docker compose build
```
# Запустить контейнеры
```
docker compose up
```

# Установить пакеты
```
docker compose exec php chown www-data:www-data -R /app/app
docker compose exec -u www-data php  composer install
```
# Запуск тестов
```
docker compose exec -u www-data php  php artisan test --env=testing
```

# В браузере
```
http://127.0.0.1
```
или добавить в файл ```/etc/hosts```
```
127.0.1.1       va.local
```
и использовать http://va.local