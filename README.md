README

Project: Technical Assessment
For: Devly Solutions

🧭 Overview

This project is an Employee & Department Management System built with Laravel 11.
It implements all requirements of the technical assessment including CRUD for employees and departments, filters, search, authentication, dashboard, exports, and logging.

Every feature was implemented precisely — migrations, seeders, validations, filters, exports, and logging.

✅ Key Features

Departments CRUD (create, update, delete, list).

Employees CRUD (name, email, phone, salary, department, status).

Filters:

Filter employees by department.

Filter employees by status.

Filter departments by name.

Search for employees and departments.

Logging:

Employee actions (create, update, delete).

Department actions (create, update, delete).

All logs saved in storage/logs/employee.log.

Authentication:

Admin login with default user:

Email: admin@gmail.com

Password: admin123

Profile management (update name, email, and password).

Dashboard:

Total number of employees.

Total number of departments.

Exports:

Employees to Excel (XLSX) and PDF with optional department filter.

🛠️ Tech Stack

PHP 8.2+

Laravel 11

MySQL

Laravel Sanctum (API auth)

maatwebsite/excel (Excel export)

barryvdh/laravel-dompdf (PDF export)

Monolog (logging)

🔧 Setup (Local)
git clone <repo-url>
cd <repo-folder>

cp .env.example .env
# Update DB settings

composer install
php artisan key:generate
php artisan migrate --seed

php artisan serve

📦 Migrations & Seeders

create_departments_table — Departments.

create_employees_table — Employees.

Seeders: DepartmentsSeeder & EmployeesSeeder.

🔐 Authentication

Web: session guard (web).

API: Sanctum tokens.

Default admin credentials:

Email: admin@gmail.com
Password: admin123


Features:

Login / Logout.

Update profile (name, email).

Change password.

🔗 API — Postman Collection

👉 Postman Documentation

Includes login, employees & departments CRUD, filters, search, and exports.

🔁 Exports

Excel — employees.xlsx via EmployeesExport.

PDF — generated from dashboard.employees.print.

📝 Logging

Custom channel employee in config/logging.php.

Logs created for employees and departments actions.

Context: action, actor (id, name, email), ip, route, changes.

✅ Main Endpoints

POST /api/auth/login — Login.

POST /api/auth/logout — Logout.

GET /api/employees — List employees (filters & search).

POST /api/employees — Create employee.

PUT /api/employees/{id} — Update employee.

DELETE /api/employees/{id} — Delete employee.

GET /api/employees/export/{department?}/{type} — Export employees.

GET /api/departments — List departments (filters & search).

POST /api/departments — Create department.

PUT /api/departments/{id} — Update department.

DELETE /api/departments/{id} — Delete department.

📊 Dashboard

Displays count of employees.

Displays count of departments.

Final Notes

Code is clean, fully documented, and meets all technical requirements.

Extensions such as Roles/Permissions, Audit history, or advanced reports can be added easily.

Contact

Devly Solutions
Author: Ibrahim Khashaba
Email: ibrahimahmedkhashaba@gmail.com

Whatsapp: +201124782711
