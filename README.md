# Task Management Web Application

A simple Laravel-based task management application that supports multiple projects. Users can:

- Create and manage projects
- Create tasks within a project
- View tasks filtered by selected project
- Edit, delete, and reorder tasks via drag-and-drop

---

## 🚀 Features

- Laravel 10 (or latest stable)
- MySQL database
- Bootstrap 5 UI
- jQuery UI sortable for task reordering
- AJAX-based priority updates
- Projects dropdown for task filtering

---

## 🛠 Setup Instructions

### Prerequisites

- PHP 8.1+
- Composer
- MySQL
- Node.js & npm (for frontend assets)

### Installation

1. **Clone the repository**

```bash
git clone https://github.com/your-username/task-manager.git
cd task-manager
```

2. **Install dependencies**

```bash
composer install
npm install && npm run build
```

3. **Create `.env` file**

```bash
cp .env.example .env
```

4. **Configure `.env`**

Update your database settings:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_management
DB_USERNAME=root
DB_PASSWORD=your_password
```

5. **Generate application key**

```bash
php artisan key:generate
```

6. **Run migrations and seed sample projects**

```bash
php artisan migrate --seed
```

7. **Serve the application**

```bash
php artisan serve
```

Visit: `http://localhost:8000`

---

## 📁 Project Structure Overview

- `app/Models/Task.php` - Task model with project relationship
- `app/Models/Project.php` - Project model
- `app/Http/Controllers/TaskController.php` - Task CRUD + reorder
- `resources/views/tasks/index.blade.php` - Main UI with dropdown, task list
- `routes/web.php` - Route definitions

---

## ✨ Bonus Functionality: Project Support

- Tasks are now associated with a `project_id`
- Dropdown filters tasks by selected project
- Creating a task auto-links it to the selected project
- Priority is unique per project (drag-and-drop updates priority only within the selected project)

---

## 🙌 Author

Developed by Tejal Gandhi as part of a Laravel task management project challenge.

---

## 📝 License

This project is open-source and free to use.

