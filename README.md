# Student Management System (Laravel 13 Final Project)

Login & Register, related tables with migrations/models, CRUD with search by name and filters, seeders, Bootstrap 5 HTML tables.

**Tables:** `departments` (PK `dept_id`, dept_name, manager_id, location_id) → `students` (PK `student_id`, FK `dept_id`). The student list shows **Dept_Name** from the departments table.

## How to run

These folders contain **only the files you add/replace** in a fresh Laravel 13 app.

```bash
# 1. Create a fresh Laravel 13 project
composer create-project laravel/laravel:^13.0 student-management-system
cd student-management-system

# 2. Copy this folder's app/, database/, resources/, routes/ over the new project
#    (say "yes" to replace User.php, web.php and DatabaseSeeder.php)

# 3. Create a MySQL database called student_db, then edit .env:
#    DB_CONNECTION=mysql
#    DB_HOST=127.0.0.1
#    DB_PORT=3306
#    DB_DATABASE=student_db
#    DB_USERNAME=root
#    DB_PASSWORD=

# 4. Build tables + seed test data
php artisan migrate:fresh --seed

# 5. Start
php artisan serve
```

Open http://127.0.0.1:8000 → login with **admin@gmail.com / 12345**, or register a new account.

## Push to GitHub

```bash
git init
git add .
git commit -m "Student Management System - Laravel 13 final project"
git branch -M main
git remote add origin https://github.com/<your-username>/student-management-system.git
git push -u origin main
```

## Files

```
app/Http/Controllers/AuthController.php
app/Http/Controllers/DepartmentController.php
app/Http/Controllers/StudentController.php
app/Models/Department.php
app/Models/Student.php
app/Models/User.php
database/migrations/2026_01_01_000001_create_departments_table.php
database/migrations/2026_01_01_000002_create_students_table.php
database/seeders/DatabaseSeeder.php
database/seeders/DepartmentSeeder.php
database/seeders/StudentSeeder.php
resources/views/departments/_form.blade.php
resources/views/departments/create.blade.php
resources/views/departments/edit.blade.php
resources/views/departments/index.blade.php
resources/views/layouts/app.blade.php
resources/views/login.blade.php
resources/views/register.blade.php
resources/views/students/_form.blade.php
resources/views/students/create.blade.php
resources/views/students/edit.blade.php
resources/views/students/index.blade.php
resources/views/students/show.blade.php
routes/web.php
```
