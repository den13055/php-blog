# 📝 Basa Blog

A simple blog using pure PHP and MySQL for learning the basics of web development.
Implemented user registration, session authentication, and article creation and management.

![PHP](https://img.shields.io/badge/php-%5E7.4-blue)
![MySQL](https://img.shields.io/badge/mysql-%5E5.7-orange)
![License](https://img.shields.io/badge/license-MIT-green)

## ✨ Features

- 📝 New User Registration
- 🔐 Login/Logout
- 👤 View Profile
- ➕ Add Article
- 📃 Article List (Latest 9)
- ✏️ Edit and Delete Articles
- 🔀 Easy Routing via the `?act=...` Parameter

## 📋 Requirements

- 🐘 PHP 7.4 or higher
- 🗄️ MySQL 5.7 or higher
- 🌐 Web server (Apache, Nginx) with PHP and session support

## ⚙️ Installation

1. Clone the repository to your web server folder:
```bash
git clone https://github.com/username/basa-blog.git
cd basa-blog
```

2. Configure the database connection in the `config.php` file:
```php
const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASS = "";
const DB_NAME = "basa_blog";
```

3. Create a MySQL database and tables. Example of a minimal structure:
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

4. Ensure that the web server has read access to all files and write access to the required directories (if image uploads are added later).

## 📁 Project Structure

```
basa-blog/
├── config.php # Database Configuration
├── Index.php # Entry Point, Routing, Home Page Loading
├── functions/
│ └── helpers.php # Helper Functions
├── action/ # Action Handlers
│ ├── register.php
│ ├── login.php
│ ├── logout.php
│ ├── profile.php
│ ├── add.php
│ ├── articles.php
│ ├── edit.php
│ └── delete.php
└── templates/
└── index.php # Main Page Template
```

## 🚀 Usage

Different sections are accessed via the `act` GET parameter:

| Action | URL |
|-----------------|-------------------------|
| 📝 Register | `index.php?act=register` |
| 🔑 Login | `index.php?act=login` |
| 👤 Profile | `index.php?act=profile` |
| ➕ Add Article | `index.php?act=add` |
| 📄 All Articles | `index.php?act=articles` |
| ✏️ Edit | `index.php?act=edit` |
| 🗑️ Delete | `index.php?act=delete` |
| 🚪 Logout | `index.php?act=logout` |

The main page displays the 9 most recent articles.

This project is created for educational purposes only.

## 📄 License

MIT License
