# README

**Project:** Smart Clinic - Technical Assessment

**For:** Devly Solutions

---

## 🧭 Overview

This project is an **Employee Management System** implemented fully according to the provided technical assessment specifications. It is built with Laravel and covers CRUD operations for Employees and Departments, RESTful API, exporting reports (Excel/PDF), and action logging to a dedicated file.

> Every part of the requirements was implemented precisely — migrations, seeders, validations, filters, and exports.

---

## ✅ Key Features

* Full CRUD for employees (Name, Email, Department, Salary).
* Departments module with One-to-Many relationship (each employee belongs to a department).
* Employee list with department name, filter by department, and pagination (10 rows/page).
* RESTful API for employees, protected with Laravel Sanctum token auth.
* Export employees list to Excel (XLSX) and PDF with department filter option.
* Logging of important actions (created, updated, deleted) to a dedicated log file `storage/logs/employee.log` including actor info (id, name, email), IP, and route.
* Migrations & Seeders for Departments and Employees.

---

## 🛠️ Tech Stack

* PHP 8.2+
* Laravel 11
* MySQL
* Laravel Sanctum (API auth)
* maatwebsite/excel (Excel export)
* barryvdh/laravel-dompdf (PDF export)
* Monolog (logging)

---

## 🔧 Setup (Local)

1. Clone the project:

```bash
git clone <repo-url>
cd <repo-folder>
```

2. Copy environment file:

```bash
cp .env.example .env
# Edit DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
```

3. Install dependencies:

```bash
composer install
npm install && npm run build # if frontend exists
```

4. Generate app key:

```bash
php artisan key:generate
```

5. Run migrations and seeders:

```bash
php artisan migrate --seed
```

6. Link storage (for exports and file access):

```bash
php artisan storage:link
```

7. Clear caches (optional):

```bash
php artisan config:clear
php artisan route:clear
php artisan cache:clear
```

8. Start local server:

```bash
php artisan serve
```

---

## 📦 Migrations & Seeders

* `create_departments_table` — Departments table.
* `create_employees_table` — Employees table (id, name, email, salary, department\_id, status, timestamps).
* Seeders: DepartmentsSeeder & EmployeesSeeder.

---

## 🔐 Authentication

* Web uses `web` guard (session-based).
* API is protected with **Sanctum tokens**:

  * `POST /api/auth/login` with {email, password} returns `token`.
  * Use header `Authorization: Bearer {token}` for protected API requests.

---

## 🔗 API — Postman Collection

All API endpoints are documented in Postman collection:
👉 [https://documenter.getpostman.com/view/40282253/2sB3Hkr1dw](https://documenter.getpostman.com/view/40282253/2sB3Hkr1dw)

This includes login, employees CRUD, and export endpoints.

---

## 🔁 Exports

Two approaches available:

### 1. Direct download (stream)

* Excel: Generates `employees.xlsx` via `EmployeesExport`.
* PDF: Generates PDF from `dashboard.employees.print` view.

### 2. Save & return URL

* Files are saved under `storage/app/public/exports`.
* Returns public URL via `Storage::disk('public')->url($path)`.
* Recommended for large exports or async jobs.

---

## 📝 Logging

* Custom channel in `config/logging.php`:

```php
'employee' => [
    'driver' => 'single',
    'path' => storage_path('logs/employee.log'),
    'level' => 'info',
],
```

* Logs are recorded inside `Employee` model events: `created`, `updated`, `deleted`.
* Context includes: `action`, `actor` (id, name, email, guard), `employee`/`changes`, `ip`, `route`.

---

## ✅ Main Endpoints

* `POST /api/auth/login` — Login (returns token).
* `POST /api/auth/logout` — Logout (delete token).
* `GET /api/employees` — List employees (with `?department=ID` & pagination).
* `POST /api/employees` — Create employee.
* `PUT /api/employees/{id}` — Update employee.
* `DELETE /api/employees/{id}` — Delete employee.
* `GET /api/employees/export/{department?}/{type}` — Export (`type = excel|pdf`).

---

## 🧪 Testing

* PHPUnit ready (`phpunit.xml`).
* API can be tested via Postman collection.

---

## ⚙️ Deployment

* Run:

```bash
composer install --optimize-autoloader --no-dev
php artisan migrate --force
```

* Configure `.env` (DB, APP\_KEY, APP\_ENV).
* Run queue workers if needed:

```bash
php artisan queue:work --tries=3
```

* Ensure storage permissions and `php artisan storage:link`.

---

## Final Notes

* Code quality, documentation, and compliance with requirements are ensured.
* Extensions such as Roles & Permissions, Audit history, or Export history can be easily added.

---

## Contact

**Devly Solutions**
Author: Ibrahim Khashaba
