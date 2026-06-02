# ☕ Cafe Payroll Management System

A web-based Payroll Management System built with Laravel 12 and MySQL that automates employee payroll computation, attendance tracking, deductions, and reporting.

---

## 📌 Project Description

The Cafe Payroll Management System is designed to automate payroll processing for café businesses. It eliminates manual computation errors and improves efficiency in handling employee records, attendance, deductions, and payroll generation.

---

## 👨‍💻 Developers

- Agaton, Jhon Kurt V. 
- Esguerra, Diana
- Cordero Kerby

---

## ⚙️ System Features

### Employee Module
- View profile
- View attendance
- View payslip

### Admin Module
- Manage employees
- Manage attendance
- Manage deductions
- Generate payroll
- Export reports

---

## 💰 Payroll Computation

Gross Pay:
Gross Pay = Daily Rate × Present Days

Late Deduction:
Late Deduction = Late Days × (Daily Rate × 0.20)

Net Pay:
Net Pay = Gross Pay - Total Deductions

---

## 🗄 Database Tables

- users
- employees
- attendance
- deductions
- payroll

---

## 🛠 Tech Stack

- Laravel 12
- PHP 8+
- MySQL
- Blade Templates

---

## 🚀 Installation

### Clone Project
git clone https://github.com/your-repo/cafe-payroll.git
cd cafe-payroll

---

### Install Dependencies
composer install
npm install

---

### Setup Environment
cp .env.example .env
php artisan key:generate

---

### Setup Database
DB_DATABASE=cafe_payroll
DB_USERNAME=root
DB_PASSWORD=

---

### Run Migration + Seeder
php artisan migrate:fresh --seed

---

### Run Server
php artisan serve

---

## 📤 Export Features

- PDF Export

---

## 🌐 Deployment

Link:
https://your-cafe-payroll-system.com

Platform:
- Railway

---

## 🔐 Default Login

Admin:
admin@cafe.com
password

---

## 📌 License

For educational purposes only.