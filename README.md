# 🚀 Technical Assessment  

## 📌 Project  
**Employee & Department Management System**  

## 🏢 Company  
**Devly Solutions**  

---

## 🧭 Overview  
A complete **Employee & Department Management System** built with **Laravel 12**.  

✔ Implements **all technical assessment requirements**:  
- CRUD for Employees & Departments  
- Search & Filters  
- Authentication  
- Dashboard  
- Exports (Excel / PDF)  
- Detailed Logging  

---

## ✨ Core Features  

### 🏢 Departments  
- 🔹 Full CRUD (create / update / delete / list)  
- 🔹 Search & filter support  
- 🔹 Action logging  

### 👥 Employees  
- 🔹 Full CRUD (name, email, salary, department)  
- 🔹 Search & filter by department  
- 🔹 Action logging  

### 📝 Logging  
- 📂 Employees → `storage/logs/employee.log`  
- 📂 Departments → `storage/logs/department.log`  
- 🔍 Each log entry includes: **action, actor (id, name, email), IP, route, changes**  

### 🔐 Authentication  
- Admin login (default credentials):  
  - **Email:** `admin@gmail.com`  
  - **Password:** `admin123`  
- Features: Login, Logout, Update profile, Change password  

### 📊 Dashboard  
- 👥 Total Employees count  
- 🏢 Total Departments count  

### 📤 Exports  
- 📊 **Excel (XLSX)** → optional department filter  
- 📑 **PDF** → optional department filter  

---

## 🛠 Tech Stack  
- 🐘 **PHP 8.2+**  
- 🚀 **Laravel 12**  
- 🗄️ **MySQL**  
- 🔑 **Laravel Sanctum** (API auth)  
- 📊 **maatwebsite/excel** (Excel export)  
- 📑 **barryvdh/laravel-dompdf** (PDF export)  
- 📝 **Monolog** (custom logging)  

---

## ⚙️ Setup (Local)  

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

## 📦 Database & Seeders  

- `create_departments_table` → Departments  
- `create_employees_table` → Employees  
- `DepartmentsSeeder` & `EmployeesSeeder`  

---

## 🔗 API Documentation  

👉 [Postman Collection](https://documenter.getpostman.com/view/40282253/2sB3Hkr1dw)  

### 📑 Endpoints  

#### 🔐 Authentication  
| Method | Endpoint       | Description  | Auth Required |
|--------|----------------|--------------|---------------|
| POST   | `/api/login`   | Login user   | No            |
| POST   | `/api/logout`  | Logout user  | Yes           |

#### 📊 Dashboard  
| Method | Endpoint          | Description                  | Auth Required |
|--------|-------------------|------------------------------|---------------|
| GET    | `/api/dashboard`  | Get employees & departments count | Yes       |

#### 👤 Profile  
| Method | Endpoint              | Description              | Auth Required |
|--------|-----------------------|--------------------------|---------------|
| GET    | `/api/profile`        | Get authenticated user   | Yes           |
| PUT    | `/api/profile/update` | Update name & email      | Yes           |
| PUT    | `/api/profile/password` | Update password        | Yes           |

#### 👥 Employees  
| Method | Endpoint                     | Description                | Auth Required |
|--------|------------------------------|----------------------------|---------------|
| GET    | `/api/employees`             | List all employees         | Yes           |
| GET    | `/api/employees/{id}`        | Get employee by ID         | Yes           |
| POST   | `/api/employees`             | Create new employee        | Yes           |
| PUT    | `/api/employees/{id}`        | Update employee by ID      | Yes           |
| DELETE | `/api/employees/{id}`        | Delete employee by ID      | Yes           |
| GET    | `/api/employees/export/excel`| Export employees to Excel  | Yes           |
| GET    | `/api/employees/export/pdf`  | Export employees to PDF    | Yes           |

#### 🏢 Departments  
| Method | Endpoint                       | Description                 | Auth Required |
|--------|--------------------------------|-----------------------------|---------------|
| GET    | `/api/departments`             | List all departments        | Yes           |
| GET    | `/api/departments/{id}`        | Get department by ID        | Yes           |
| POST   | `/api/departments`             | Create new department       | Yes           |
| PUT    | `/api/departments/{id}`        | Update department by ID     | Yes           |
| DELETE | `/api/departments/{id}`        | Delete department by ID     | Yes           |

---

## ✅ Final Notes  

- 🧹 Codebase: clean, tested, and documented  
- 🛠 Ready for extension: Roles/Permissions, Audit history, Advanced reports  

---

## 📬 Contact  

👤 **Author:** Ibrahim Khashaba  
📧 **Email:** ibrahimahmedkhashaba@gmail.com  
📱 **WhatsApp:** [+20 112 478 2711](https://wa.me/201124782711)  
# Start local server
php artisan serve
