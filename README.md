# 🔐 PHP Login & Logout System

This is a simple and secure **Login and Logout System** built using **Core PHP** and **MySQL**. It demonstrates user authentication, session management, and basic form validation — ideal for learning how login systems work from scratch.

---

## 📌 Features

- User login and logout functionality
- Password hashing using `password_hash()`
- Session-based authentication
- Redirects based on login status
- Secure form validation and error handling
- Simple, clean UI (optional: Bootstrap-based)

---

## 🧰 Tech Stack

- **Language:** PHP  
- **Database:** MySQL  
- **Frontend:** HTML, CSS  
- **Server:** Apache (WAMP/XAMPP recommended)

---

## 🚀 Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/VijayChaudhary2557/Login-Logout-in-PHP.git
```

### 2. Setup the Database

Use this command to create loginform table in MySQL database

```bash
CREATE TABLE `loginform` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```

### 3. Stablish Connection to Database

```bash
$conn = mysqli_connect("your_server","username","password","your_database");
```

## ✨ Screenshots

![image](https://github.com/user-attachments/assets/b5967416-8dda-4043-beb1-e27fe22ecd20)

![image](https://github.com/user-attachments/assets/24ec10b0-4246-4deb-95c0-ede1d0524c91)

## Deploy Link
https://login-logout-in-php.onrender.com/


