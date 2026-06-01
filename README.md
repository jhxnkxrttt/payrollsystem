# Café Payroll Management System

A comprehensive Laravel-based payroll management system for café employees with attendance tracking, payroll generation, and reporting capabilities.

## 🎯 Features

### Core Features
- **Authentication System**
  - Secure login/logout with session management
  - Password hashing with automatic migration from plaintext
  - Role-based access control (Admin, Employee)

- **Employee Management**
  - Create, read, update, delete employee records
  - Track employee positions and hire dates
  - Manage monthly salaries and employment status

- **Attendance Tracking**
  - Daily attendance logs (present, absent, late)
  - Time in/time out tracking
  - Admin manual entry and employee self-service

- **Payroll Management**
  - Automated payroll generation
  - 15-day cutoff periods (1st-15th and 16th-end of month)
  - Calculation of gross pay, deductions, and net pay
  - Support for multiple deduction types (SSS, PhilHealth, Pag-IBIG)

- **Reporting & Exports**
  - Comprehensive admin dashboard with statistics
  - Payroll history and reports
  - Multiple export formats: JSON, CSV, PDF (planned)
  - RESTful API endpoints for data access

## 👥 Developers

- Team Members: [Add your names here]

## 🏗️ Project Structure

```
payroll/
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   └── Http/Middleware/
├── database/migrations/
├── database/seeders/
├── resources/views/
│   ├── layouts/
│   ├── components/
│   ├── admin/
│   └── employee/
├── routes/
│   ├── web.php
│   └── api.php
└── public/
```

## 🗄️ Database Schema

- **Users**: Admin and employee accounts
- **Employees**: Employee records with salary info
- **Payroll**: Generated payroll records
- **Attendance**: Daily attendance logs
- **Deductions**: Salary deductions (SSS, PhilHealth, etc.)

## 🚀 Installation & Setup

### Prerequisites
- PHP 8.2+
- Laravel 12
- MySQL/MariaDB
- Composer

### Installation Steps

1. **Clone and setup**
   ```bash
   git clone <repository-url>
   cd payroll
   composer install
   ```

2. **Configure environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Setup database**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

4. **Run application**
   ```bash
   php artisan serve
   ```

Visit: `http://localhost:8000`

## 📝 Default Credentials

**Admin:**
- Email: `admin@cafe.com`
- Password: `admin123`

**Employee:**
- Email: `miguel.santos@cafe.com`
- Password: `password123`

## 🔐 Roles & Permissions

**Admin**: Manage all system features (employees, payroll, attendance, reports)

**Employee**: View dashboard, payslips, and personal attendance

## 🔗 API Endpoints

- `GET /api/employees` - List employees
- `POST /api/employees` - Create employee
- `GET /api/payrolls` - List payrolls
- `GET /api/payrolls/export/csv` - Export as CSV
- `GET /api/attendance` - List attendance

## 📋 Requirements Checklist

- ✅ Authentication System
- ✅ CRUD Operations
- ✅ Database Design (Migrations, Eloquent, Seeders)
- ✅ RESTful API
- ✅ Master Layout & Blade Components
- ✅ Middleware Protection
- ✅ Auto-Generated Reports
- ✅ GitHub Repository
- ✅ Additional Features (API exports, Auto-payroll)

## 📄 License

MIT License

---

**Last Updated:** June 1, 2026


Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
