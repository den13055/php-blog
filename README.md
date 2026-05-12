# 📝 Basa Blog

Простой блог на чистом PHP и MySQL для изучения основ веб-разработки.  
Реализована регистрация пользователей, авторизация через сессии, создание и управление статьями.

![PHP](https://img.shields.io/badge/php-%5E7.4-blue)
![MySQL](https://img.shields.io/badge/mysql-%5E5.7-orange)
![License](https://img.shields.io/badge/license-MIT-green)

## ✨ Возможности

- 📝 Регистрация нового пользователя
- 🔐 Вход / выход из системы
- 👤 Просмотр профиля
- ➕ Добавление статьи
- 📃 Список статей (последние 9)
- ✏️ Редактирование и удаление статей
- 🔀 Простая маршрутизация через параметр `?act=...`

## 📋 Требования

- 🐘 PHP 7.4 или выше
- 🗄️ MySQL 5.7 или выше
- 🌐 Веб-сервер (Apache, Nginx) с поддержкой PHP и сессий

## ⚙️ Установка

1. Клонируйте репозиторий в папку веб-сервера:
   ```bash
   git clone https://github.com/username/basa-blog.git
   cd basa-blog
   ```

2. Настройте подключение к базе данных в файле `config.php`:
   ```php
   const DB_HOST = "localhost";
   const DB_USER = "root";
   const DB_PASS = "";
   const DB_NAME = "basa_blog";
   ```

3. Создайте базу данных MySQL и таблицы. Пример минимальной структуры:
   ```sql
   CREATE DATABASE IF NOT EXISTS basa_blog;
   USE basa_blog;

   CREATE TABLE user (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50) NOT NULL UNIQUE,
       password VARCHAR(255) NOT NULL,
       email VARCHAR(100) NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
   );

   CREATE TABLE article (
       id INT AUTO_INCREMENT PRIMARY KEY,
       title VARCHAR(255) NOT NULL,
       content TEXT NOT NULL,
       user_id INT NOT NULL,
       created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       FOREIGN KEY (user_id) REFERENCES user(id)
   );
   ```

4. Убедитесь, что веб-сервер имеет права на чтение всех файлов и запись в необходимые директории (если в дальнейшем добавлена загрузка изображений).

## 📁 Структура проекта

```
basa-blog/
├── config.php              # Конфигурация БД
├── Index.php               # Точка входа, маршрутизация, загрузка главной страницы
├── functions/
│   └── helpers.php         # Вспомогательные функции
├── action/                 # Обработчики действий
│   ├── register.php
│   ├── login.php
│   ├── logout.php
│   ├── profile.php
│   ├── add.php
│   ├── articles.php
│   ├── edit.php
│   └── delete.php
└── templates/
    └── index.php           # Шаблон главной страницы
```

## 🚀 Использование

Доступ к различным разделам осуществляется через GET-параметр `act`:

| Действие        | URL                      |
|-----------------|--------------------------|
| 📝 Регистрация     | `index.php?act=register` |
| 🔑 Вход            | `index.php?act=login`    |
| 👤 Профиль         | `index.php?act=profile`  |
| ➕ Добавить статью | `index.php?act=add`      |
| 📄 Все статьи      | `index.php?act=articles` |
| ✏️ Редактировать   | `index.php?act=edit`     |
| 🗑️ Удалить         | `index.php?act=delete`   |
| 🚪 Выйти           | `index.php?act=logout`   |

Главная страница отображает 9 последних статей.

## ⚠️ Известные проблемы и безопасность

- 🛡️ **SQL-инъекции**: несмотря на использование `intval()` для `$_SESSION['userId']`, остальные параметры (например, в обработчиках `register`, `login`, `edit`) могут быть уязвимы, если валидация отсутствует. Рекомендуется использовать подготовленные запросы (`prepared statements`).
- 🐞 **Ошибка в `ini_set`**: в файле `Index.php` допущена опечатка — `'display errors'` вместо `'display_errors'`. Из-за этого ошибки не будут отображаться, несмотря на `error_reporting(E_ALL)`. Следует исправить на `ini_set('display_errors', 1);`.
- 🔒 **Хранение паролей**: в исходном коде не приведено хеширование паролей. Обязательно используйте `password_hash()` и `password_verify()` при регистрации и входе.
- 🚫 **Отсутствие проверки прав**: любой авторизованный пользователь может редактировать или удалять чужие статьи. Необходимо добавить проверку принадлежности статьи текущему пользователю.

Проект создан исключительно в учебных целях. Не используйте его в публичном доступе без устранения перечисленных уязвимостей.

## 📄 Лицензия

MIT License
