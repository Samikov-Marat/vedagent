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