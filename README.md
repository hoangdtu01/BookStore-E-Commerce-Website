# 📚 BookStore - Online Book Shopping Website

A full-stack e-commerce web application built with **Laravel Framework**, allowing users to browse books, search and filter products, manage shopping carts, place orders, leave reviews, and manage personal accounts.

The system also includes a complete **Admin Dashboard** for managing books, authors, categories, users, and customer orders.

---

##  Features

### Customer Features

* Browse books with pagination
* Search books by title
* Filter books by:

  * Author
  * Category
  * Price Range
* View detailed book information
* Add products to cart
* Quick Cart sidebar (AJAX)
* Update cart quantity
* Checkout and place orders
* View order history
* User registration & authentication
* Account management
* Password reset via email verification
* Comment and rating system

---

### Administrator Features

* Dashboard statistics
* Book management (CRUD)
* Upload multiple book images
* Author management
* Category management
* User management
* Order management
* Update order status
* Revenue and inventory overview

---

## System Architecture

```text
Client Browser
       │
       ▼
Laravel Routes
       │
       ▼
Controllers
       │
       ▼
Models (Eloquent ORM)
       │
       ▼
MySQL Database
```

---

## Screenshots

| Home Page                 | Shop Page                 |
| ------------------------- | ------------------------- |
| <img width="1918" height="972" alt="Image" src="https://github.com/user-attachments/assets/a9be6efe-5a46-4009-a72a-adf1d5e9c061" /> |<img width="1917" height="973" alt="Image" src="https://github.com/user-attachments/assets/b32ca61c-405c-4d1e-91f6-433249828972" /> |

| Quick Cart                | Book Detail                      |
| ------------------------- | -------------------------------- |
| <img width="1918" height="908" alt="Image" src="https://github.com/user-attachments/assets/2715ebb0-bae8-4115-b7e0-b8a34d04dad1" /> | <img width="1913" height="911" alt="Image" src="https://github.com/user-attachments/assets/e328e057-40c1-460f-b982-f39880d8468a" /> |

| User Login                 | User Account                 |
| -------------------------- | ---------------------------- |
| <img width="1917" height="911" alt="Image" src="https://github.com/user-attachments/assets/3827df2a-3025-4bb7-90dd-90e31222edd5" /> | <img width="1918" height="913" alt="Image" src="https://github.com/user-attachments/assets/521927ae-4ea0-4461-a477-a12c8e249d5b" /> |

| Admin Dashboard                      | Add New Book                        |
| ------------------------------------ | ----------------------------------- |
| <img width="1918" height="910" alt="Image" src="https://github.com/user-attachments/assets/9e4a261a-42a2-4a0a-97b2-535c392de329" /> | <img width="1918" height="911" alt="Image" src="https://github.com/user-attachments/assets/5016e9bc-a5bf-44bf-aa94-31b75cae7bcb" /> |

---

## Technologies

| Category        | Technology                    |
| --------------- | ----------------------------- |
| Backend         | Laravel, PHP                  |
| Frontend        | HTML5, CSS3, JavaScript, AJAX |
| Database        | MySQL                         |
| Environment     | Laragon                       |
| Package Manager | Composer                      |
| Version Control | Git, GitHub                   |

---

## Installation & Run

### 1. Clone Repository

```bash
git clone https://github.com/YOUR_USERNAME/bookstore-laravel.git
cd bookstore-laravel
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Create Environment File

```bash
cp .env.example .env
```

Configure database:

```env
DB_DATABASE=bookstore
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key

```bash
php artisan key:generate
```

### 5. Import Database

Import:

```text
docs/database/bookstore.sql
```

into MySQL.

### 6. Create Storage Link

```bash
php artisan storage:link
```

### 7. Run Project

```bash
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

---

## 📖 User Guide

### Customer Workflow

1. Register/Login
2. Browse books
3. Search or filter books
4. View book details
5. Add books to cart
6. Checkout and place orders
7. Track order history
8. Leave comments and ratings

---

### Administrator Workflow

Access:

```text
/admin
```

Functions:

* Manage Books
* Manage Categories
* Manage Authors
* Manage Users
* Manage Orders
* Monitor Dashboard Statistics

---

## 📂 Project Structure

```text
app/
├── Http/
│   └── Controllers/
│       ├── adminController/
│       ├── AuthController/
│       ├── DetailBookController/
│       ├── GioHangController/
│       ├── checkoutController/
│       └── OrderController/
│
├── Models/
│   ├── Book.php
│   ├── Image.php
│   ├── TacGia.php
│   ├── TheLoai.php
│   ├── GioHang.php
│   ├── DonHang.php
│   ├── DetailDH.php
│   ├── Comment.php
│   └── User.php
│
resources/
├── views/
│   ├── admin/
│   ├── user/
│   └── layouts/
│
routes/
└── web.php
│
docs/
├── database/
│   └── bookstore.sql
└── images/
```

---

## Database Design

### Main Entities

* User
* Book
* Image
* Author
* Category
* Cart
* Order
* Order Detail
* Comment

### Relationships

```text
Author
   │
   └── Book
           ├── Images
           ├── Comments
           └── Order Details

User
   ├── Cart
   ├── Orders
   └── Comments
```

---

## Security

* Authentication Middleware
* Admin Middleware
* Form Validation
* Password Hashing
* Email Verification
* Protected Admin Routes

---

## Acknowledgements

This project was developed using the **Laravel Framework**.

Laravel is an open-source PHP framework created by **Taylor Otwell** and maintained by the Laravel community.

Official Website:

https://laravel.com

Documentation:

https://laravel.com/docs

GitHub Repository:

https://github.com/laravel/laravel

Special thanks to the Laravel team and contributors for providing a powerful and elegant framework for modern web application development.

---

## 📄 License

This project is licensed under the MIT License.

Laravel Framework is also licensed under the MIT License.

---

## 👨‍💻 Author

**Trần Văn Hoàng**

Vietnam - Korea University of Information and Communication Technology (VKU)

GitHub:
https://github.com/hoangdtu01
