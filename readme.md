Запуск контейнера: (разворачивается на http://0.0.0.0:8080)

    make start

Для корректной работы скопировать .env.example как .env

Вход в контейнер:
        
    make
    
Разворачивание миграций:

    php artisan migrate
    
Запуск composer:

    composer install
        
Список доступных ендпоинтов:

    php artisan route:list

Создание товаров и юзеров осущесвляется через редактирование бд:

    mysql:
    
    host: 127.0.0.1:3306
    user: laraveluser
    pass: root
    database: laravel
    
Запрос на создание заказа:

    http://0.0.0.0:8080/api/order/
    
    POST
    
    {
    	"name": "fff",
    	"email": "des1roer@mail.ru",
    	"phone": "fff",
    	"items": [
    		{
    		"id": 1,
    		"qty": 1
    		}
    	]
    }
    
    output:
    
    {
      "user_id": 1,
      "created_at": "2020-07-14 05:35:23",
      "id": 131
    }

Запрос продуктов:

    GET

    http://0.0.0.0:8080/api/product/
    
    [
      {
        "id": 1,
        "name": "fsdf",
        "description": "fdgfd",
        "price": 10,
        "qty": 42
      },
      {
        "id": 2,
        "name": "sda",
        "description": "asdad",
        "price": 5,
        "qty": 100
      }
    ]
    
    http://0.0.0.0:8080/api/product/1
    
    {
      "id": 1,
      "name": "fsdf",
      "description": "fdgfd",
      "price": 10,
      "qty": 42
    }
    
Почта сохраняется в storage/logs/*

Для запуска отправки ежедневного отчета в crontab дописать

    * * * * * cd ~path-to-project/laravel-docker && php artisan schedule:run >> /dev/null 2>&1
    
Последующая интеграция со slack и\или 1с решается дописанием еще одного listener и event
