# 📚 Manage Library Books - CodeIgniter 4 CRUD Application

A simple library inventory system built with CodeIgniter 4, featuring:

- Create, Read, Update, Delete (CRUD) book records  
- Optional cover image upload  
- Form validation  
- Clean UI with custom color scheme (**#F4862C**, **#CDF6FF**)  
- Responsive table & styled buttons  
- Image replacement and deletion handling  

---

## 🚀 Features

### 📘 Add Book
- Enter title, author, genre, publication year  
- Upload a cover image (optional)  
- Default placeholder image used if none uploaded  

### 📖 View Books
- List of all books displayed in a styled table  
- Shows title, author, genre, year, and cover image  

### ✏️ Edit Book
- Form pre-filled with existing values  
- Optionally upload a new image  
- Old image deleted automatically  

### 🗑 Delete Book
- Confirmation dialog  
- Deletes both record and associated image  

### ✔ Form Validation
- Required: title, author, publication year  
- Year must be numeric and ≤ current year  

---

## 🛠 Tech Stack
- **Backend:** PHP 8, CodeIgniter 4  
- **Frontend:** HTML, CSS  
- **Database:** MySQL  
- **Tools:** Composer, Git  

---

## 📥 Installation & Setup

### 1️⃣ Clone the repository
```
git clone https://github.com/YOUR_USERNAME/manage-library-books.git
cd manage-library-books
```
### 2️⃣ Install dependencies
```
composer install
```
### 3️⃣ Configure environment
Copy the example env file:
```
cp env .env
```
Enable development mode:
```
CI_ENVIRONMENT = development
```
Database config:
```
database.default.hostname = localhost
database.default.database = library_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```
### 4️⃣ Create the MySQL database
```
mysql -u root
```
Inside MySQL:
```
CREATE DATABASE library_db;
EXIT;
```
### 5️⃣ Run migrations
```
php spark migrate
```
### 6️⃣ Start server
```
php spark serve
```
Visit:

http://localhost:8080

## 📂 Folder Structure Overview
```
app/
  Controllers/     → BookController.php
  Models/          → BookModel.php
  Views/books/     → index.php, create.php, edit.php
  Views/layouts/   → header.php, footer.php

public/uploads/
  default.jpg       → Placeholder image
```

## 🎨 Design Decisions & Explanation
1. MVC Architecture
- Model = database logic
- Controller = request handling + validation
- Views = UI

2. Image Upload Handling
- Uploaded images stored in public/uploads/
- Random filenames avoid collisions
- Old images removed automatically
- Default placeholder used when no file uploaded

3. Validation Rules
- Minimum character requirements for title & author
- Year ≤ current year
- Enforces data consistency

4. UI Theme
- #F4862C → primary accents
- #CDF6FF → soft background
- Clean, readable layout

5. Route Grouping
All book routes grouped under /books for clean structure.
