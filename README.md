Задача по реализации небольшого API
================================
## Текст задачи:
Бизнес модель - кафе
### Особенности:
1. Повара готовят конкретные блюда
2. Меню формируется на основе готовых блюд
3. Посетитель заказывает блюда из меню
### Разработать на php:
1. Физическая модель данных (в таблицах использовать минимум аттрибутов)
2. Метод REST API открытия чека
3. Метод REST API добавление позиции из меню в чек
4. Метод REST API получения списка популярных поваров за период ( критерий популярности - количество заказанных блюд )

Нужно использовать yii2
## Настройка окружения в докере:

1. Создаем файл .env, копируя .env.example
```shell
cp .env.example .env
```
2. Собираем и запускаем проект
```shell
make build
```
Приложение будет доступно по адресу http://localhost:8084


### Управление контейнерами
Остановить контейнер
```shell
make dd
```

Запустить контейнер
```shell
make init
```

Пересобрать образы и перезапустить контейнеры
```shell
make rebuild
```

*Если команды не работают, возможно вам нужно поставить утилиту make*

## Проверка работы приложения:
1. Заходим в файл http/api.http
2. Открываем чек используя Endpoint http://localhost:8084/api/open-check
3. Добавляем в чек позицию из меню http://localhost:8084/api/add-dish-to-check

Так же, для проверки 3 Endpoint`а есть смысл добавить позицию из меню, которая соответствует второму повару
Соответствие можно увидеть в этой таблице:

| Номер Повара | Позиции Меню (menuItemId) | 
|--------------|---------------------------|
| Повар 1      | 1,2                       | 
| Повар 2      | 3,4,5                     |
5. Указывая период и лимит (Какое количество самых популярных поваров мы хотим увидеть) в 3 Endpoint
и отправляем запрос

http://localhost:8084/api/get-popular-cook?periodStart=2023-01-01&periodEnd=2024-04-01&limit=2

