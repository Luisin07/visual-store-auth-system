# PHP Authentication & Storefront System

Mini sistema web desenvolvido em **PHP e MySQL** como parte de um teste técnico para uma vaga de **Estágio em Suporte Técnico**.  
O projeto simula uma estrutura básica de e-commerce com **autenticação de usuários e área restrita**, executado em ambiente local.

---

# Overview

O sistema apresenta dois contextos principais:

### Public Area
- Public store homepage
- Main banner
- Product listing
- Product search field
- Navigation to registration and login

### Authenticated Area
- User registration
- User login
- Restricted dashboard
- Session control
- Secure logout

---

# Features

### User Authentication
- User registration
- Secure password hashing
- Login validation
- Session-based authentication
- Restricted dashboard access
- Logout functionality

### Storefront
- Public homepage
- Product listing
- Product images
- Search functionality
- Responsive layout using Bootstrap

---

# Technologies

- PHP
- MySQL
- HTML5
- CSS3
- Bootstrap
- JavaScript
- XAMPP (Apache + MySQL)

---

# Project Structure

```text
php-auth-store
│
├── assets
│   └── images
│       ├── banner.jpg
│       ├── headphone.jpg
│       ├── keyboard.jpg
│       ├── monitor.jpg
│       ├── mouse.jpg
│       ├── notebook.jpg
│       └── watch.jpg
│
├── connection.php
├── index.php
├── register.php
├── login.php
├── dashboard.php
├── logout.php
└── README.md
```

---

# Database Setup

Create the following database:

```text
auth_store
```

Create the `users` table:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    password VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

# Running the Project

1. Install **XAMPP**
2. Move the project folder to:

```text
xampp/htdocs/
```

3. Start:
- Apache
- MySQL

4. Create the database in **phpMyAdmin**

5. Access the project in your browser:

```text
http://localhost/php-auth-store/
```

---

# Authentication Flow

1. User registers a new account
2. Password is securely hashed
3. User logs in
4. PHP session is created
5. Access to dashboard is granted
6. Session can be terminated via logout

---

# Purpose of the Project

This project demonstrates:

- Basic **PHP backend development**
- **MySQL database integration**
- **User authentication systems**
- **Session management**
- Basic **frontend structure with Bootstrap**
- Full **login → dashboard → logout flow**

---

# Notes

This application was developed to run locally using **PHP + MySQL through XAMPP** and is intended as a technical demonstration of authentication and basic web application structure.