# Гостевая книга

### Для локального запуска

1. Создать директорию для докера
```
mkdir ./storage/docker
```
2. Скопировать .env.example
```
cp .env.example .env
```
3. Добавить пользователя в .env
```
echo UID=$(id -u) >> .env
echo GID=$(id -g) >> .env
```
4. Запустить сервисы докера
```
docker compose up -d --build
```
5. Установить зависимости
```
docker exec nord-app composer install
```
6. Опубликовать ключ
```
docker exec nord-app php artisan key:generate
```
6. Сделать миграции
```
docker exec nord-app php artisan migrate --seed
```