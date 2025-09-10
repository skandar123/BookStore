# Bookstore

### 📌 Overview

The Bookstore Management System is a Java-based application designed to manage books, customers, and orders in a bookstore. It demonstrates Object-Oriented Programming (OOP) principles such as encapsulation, abstraction, inheritance, and polymorphism while providing a simple command-line interface for performing operations.

### ✨ Features

* 📚 Manage book inventory (add, update, view)
* 👤 Manage customers
* 🛒 Create and manage orders
* 💾 Store data in memory (extendable to database)
* 🧩 Follows OOP principles and design patterns

### 🏗️ Technologies Used

1. Java 8+
2. Object-Oriented Design
3. (Optional) MySQL/H2 database integration for persistence

### 📂 Project Structure

    bookstore/
    │── model/
    │   ├── Book.java
    │   ├── Customer.java
    │   └── Order.java
    │
    │── service/
    │   ├── BookService.java
    │   ├── CustomerService.java
    │   └── OrderService.java
    │
    │── utils/
    │   └── DatabaseConnection.java   # (if DB is enabled)
    │
    │── Main.java                     # Entry point

### ▶️ Running the Application

Clone this repository or download the source code.

Compile the Java files:

    javac Main.java

Run the application:

    java Main

Follow the menu options to manage books, customers, and orders.

### ⚙️ Database Configuration

To enable database persistence:

Update DatabaseConnection.java with your MySQL/H2 credentials:

    String url = "jdbc:mysql://localhost:3306/bookstore";
    String user = "root";
    String password = "your_password";


Ensure the JDBC driver is available in your classpath.

### 👩‍💻 Author

Sayantika Kandar