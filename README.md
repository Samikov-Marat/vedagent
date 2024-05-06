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
# Во втором терминале:
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

# Что изменилось:
```
app/app/Dto - DTO для передачи параметров в сервисы
app/app/Http/Controllers/CalculatorController.php - контроллер
app/app/Http/Requests - валидация запросов браузера
app/app/Models - модель Транспортной компании и заказа
app/app/Services - Сервисы калькулятора и заказа
app/config/database.php - добавил тестовую базу
app/database/factories/CompanyFactory.php - создание тестовой транспортной компании для тестов
app/public/calculator.js - javascript
app/public/calculator.js - маршруты
Тесты:
app/tests/Feature/CalculateTest.php
app/tests/Feature/OrderTest.php
app/tests/Unit/CalculateUnitTest.php
Для докера:
docker-compose.yml
docker
```