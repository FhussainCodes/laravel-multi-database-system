
---

# 📄 README.md

````md
# Laravel Multi Database System

This project demonstrates how to use **multiple database connections in Laravel** and dynamically store and retrieve data based on user selection.

---

## 🚀 Features

- Multi Database Support (MySQL connections)
- Dynamic database selection (runtime)
- User management system
- Role-based data handling
- Secure password hashing
- Laravel 12 implementation
- Clean MVC architecture

---

## 🏗️ Project Structure

This project uses two databases:

### 🗄️ Database 1: Student DB (`mysql`)
- Stores student-related users
- Default Laravel users table structure

### 🗄️ Database 2: Teacher DB (`mysql_second`)
- Stores teacher-related users
- Same schema as Student DB

---

## ⚙️ Database Configuration

In `config/database.php`:

```php
'mysql' => [
    'database' => env('DB_DATABASE', 'student_db'),
],

'mysql_second' => [
    'driver' => 'mysql',
    'host' => env('DB_HOST', '127.0.0.1'),
    'database' => env('DB_SECOND_DATABASE', 'teacher_db'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
],
````

---

## 🧑‍💻 How It Works

1. User selects database from dropdown
2. Request is sent to controller
3. Laravel uses selected connection:

   ```php
   DB::connection($database)->table('users')->insert([...]);
   ```
4. Data is stored in selected database

---

## 🔐 Password Handling

Passwords are securely stored using hashing:

```php
Hash::make($password)
```

---

## 📦 Installation

```bash
git clone https://github.com/your-username/multi-db-system.git
cd multi-db-system
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

## 🧪 Example Use Case

| Action            | Database                  |
| ----------------- | ------------------------- |
| Select Student DB | mysql (student_db)        |
| Select Teacher DB | mysql_second (teacher_db) |

---

## 🛠️ Tech Stack

* Laravel 12
* MySQL
* Blade Templates
* PHP 8+
* JavaScript (basic dynamic UI)

---

## 📌 Learning Outcome

* Multiple database connections
* Dynamic query execution
* Laravel DB facade usage
* Clean MVC implementation
* Secure authentication handling

---

## 👨‍💻 Author

Farrukh (Laravel Developer Intern Project)

---

## 📜 License

This project is for educational/internship purposes.

```
```
