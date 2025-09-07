# 📘 Technical Assessment

## 👨‍💻 Project
**Employee & Department Management System**

## 🏢 For
**Devly Solutions**

---

## 🧭 Overview
This project is an **Employee & Department Management System** built with **Laravel 12**.

It fully implements all requirements of the technical assessment, including:
- CRUD for employees and departments
- Filters & search
- Authentication
- Dashboard
- Exports (Excel/PDF)
- Logging

> ✅ Every feature was implemented precisely — migrations, seeders, validations, filters, exports, and logging.

---

## ✨ Key Features

### 🔹 Departments
- Full CRUD (create, update, delete, list).
- Search & filter support.
- Logging for all actions.

### 🔹 Employees
- Full CRUD (name, email, salary, department).
- Search & filter by department.
- Logging for create/update/delete.

### 🔹 Logging
- Employees logs → `storage/logs/employee.log`
- Departments logs → `storage/logs/department.log`
- Each log includes: **action, actor (id, name, email), ip, route, changes**.

### 🔹 Authentication
- Admin login with default user:
Email: admin@gmail.com
Password: admin123

- Features: **Login, Logout, Update profile (name/email), Change password**.

### 🔹 Dashboard
- Displays total number of **Employees**.
- Displays total number of **Departments**.

### 🔹 Exports
- Employees exportable to:
- 📊 Excel (XLSX) *(with optional department filter)*
- 📑 PDF *(with optional department filter)*

---

## 🛠 Tech Stack
- 🐘 PHP 8.2+
- 🚀 Laravel 12
- 🗄️ MySQL
- 🔑 Laravel Sanctum (API auth)
- 📊 maatwebsite/excel (Excel export)
- 📑 barryvdh/laravel-dompdf (PDF export)
- 📝 Monolog (logging)

---

## 🔧 Setup (Local)
```bash
# Clone project
git clone <repo-url>
cd <repo-folder>

# Copy environment
cp .env.example .env
# Update DB settings

# Install dependencies
composer install

# Generate app key
php artisan key:generate

# Run migrations & seeders
php artisan migrate --seed

# Start local server
php artisan serve

---

### 🔹 Authentication
📦 Migrations & Seeders

create_departments_table → Departments

create_employees_table → Employees

DepartmentsSeeder & EmployeesSeeder

🔐 Authentication

Web: session guard (web)

API: Sanctum tokens

Default admin user:

Email: admin@gmail.com
Password: admin123

🔗 API — Postman Collection

📌 All API endpoints are documented here:
👉 [Postman Documentation](https://documenter.getpostman.com/view/40282253/2sB3Hkr1dw)

Includes:

Login / Logout

Employees & Departments CRUD

Filters & Search

Exports (Excel/PDF)

🔁 Exports

📊 Excel → employees.xlsx via EmployeesExport

📑 PDF → generated from dashboard.employees.print

📝 Logging

Custom channels employee & department in config/logging.php.

Logs include: action, actor, ip, route, changes.

📊 Dashboard

👥 Employees count

🏢 Departments count

✅ Final Notes

Code is clean, tested, and fully documented.

Ready for extension: Roles/Permissions, Audit history, or advanced reports.

📬 Contact

👤 Author: Ibrahim Khashaba
📧 Email: ibrahimahmedkhashaba@gmail.com

📱 Whatsapp: +201124782711
