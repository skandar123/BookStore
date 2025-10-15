# BuyBooks - Online Bookstore

A comprehensive web-based bookstore management system built with PHP and MySQL, featuring both customer-facing and administrative interfaces.

## 📚 Project Overview

BuyBooks is a full-featured online bookstore application that allows customers to browse, search, and purchase books while providing administrators with complete control over inventory, categories, orders, and user management.

## ✨ Features

### Customer Features
- Browse books by categories
- Search functionality for finding specific books
- View detailed book information with images
- Place orders with customer details
- Responsive and user-friendly interface
- Featured books showcase
- Image slideshow gallery

### Admin Features
- **Dashboard**: Overview of categories, books, orders, and revenue
- **Admin Management**: Add, edit, delete, and manage admin users
- **Category Management**: Create and organize book categories with images
- **Book Management**: Add, update, and remove books with details and images
- **Order Management**: Track and update order status (Ordered, On Delivery, Delivered, Cancelled)
- **Secure Authentication**: Password-protected admin panel with session management

## 🛠️ Technology Stack

- **Frontend**: HTML5, CSS3, JavaScript
- **Backend**: PHP
- **Database**: MySQL
- **Icons**: Font Awesome 5.15.2
- **Security**: MD5 password hashing, session management

## 📋 Requirements

- PHP 7.0 or higher
- MySQL 5.6 or higher
- Apache/Nginx web server
- Web browser (Chrome, Firefox, Safari, Edge)

## ⚙️ Installation

1. **Clone or download the project**
   ```bash
   git clone <repository-url>
   ```

2. **Database Setup**
    - Create a MySQL database named `BookStore`
    - Import the database schema (create tables for: admin, category, book, order_book)
    - Update database credentials in `config/constants.php`:
      ```php
      define('LOCALHOST', 'localhost');
      define('DB_USERNAME', 'root');
      define('DB_PASSWORD', '');
      define('DB_NAME', 'BookStore');
      ```

3. **Configure Site URL**
    - Update the `SITEURL` constant in `config/constants.php`:
      ```php
      define('SITEURL', 'http://localhost/BuyBooks/');
      ```

4. **Set Directory Permissions**
    - Ensure write permissions for image upload directories:
        - `images/book/`
        - `images/category/`

5. **Access the Application**
    - Customer interface: `http://localhost/BuyBooks/`
    - Admin panel: `http://localhost/BuyBooks/admin/login.php`

## 📁 Project Structure

```
BuyBooks/
├── admin/                  # Admin panel files
│   ├── partials/          # Header, footer, menu components
│   ├── add-*.php          # Add admin/book/category pages
│   ├── manage-*.php       # Management pages
│   ├── update-*.php       # Update/edit pages
│   ├── delete-*.php       # Delete operations
│   ├── login.php          # Admin login
│   └── index.php          # Admin dashboard
├── CSS/                   # Stylesheets
│   ├── admin.css          # Admin panel styles
│   └── style.css          # Frontend styles
├── images/                # Image assets
│   ├── book/             # Book images
│   ├── category/         # Category images
│   └── other/            # Background and misc images
├── config/               # Configuration files
│   └── constants.php     # Database and site constants
└── [frontend pages]      # Customer-facing pages
```

## 🔐 Security Features

- Session-based authentication
- Login verification for admin access
- MD5 password hashing
- SQL injection prevention with `mysqli_real_escape_string()`
- Unauthorized access protection
- Session management with automatic timeouts

## 💡 Usage

### Admin Panel
1. Login with admin credentials
2. Navigate through the dashboard to view statistics
3. Manage categories, books, and orders from respective sections
4. Update order statuses to track deliveries
5. Add new administrators or change passwords

### Customer Interface
1. Browse the homepage for featured books
2. Use search functionality to find specific titles
3. Browse books by category
4. Click on books for detailed information
5. Place orders by filling in delivery details

## 🎨 Design Features

- Responsive grid layout for book display
- Color-coded order status indicators
- Image upload and management
- Gradient backgrounds
- Hover effects and transitions
- Clean, professional interface

## 📊 Database Tables

- **admin**: Store admin user credentials
- **category**: Book categories with images
- **book**: Book details, pricing, and inventory
- **order_book**: Customer orders and delivery information

## 🤝 Contributing

Contributions, issues, and feature requests are welcome. Feel free to check issues page if you want to contribute.

## 👤 Author

**Sayantika Kandar**

## 📝 License

Copyright © 2022. All Rights Reserved.