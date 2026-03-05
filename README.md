# 🚀 Task Manager (artist-lk)

A modern Task Management application built with **Laravel 11**, **MySQL**, and **Tailwind CSS v4**.

---

## 🛠️ Tech Stack
* **Framework:** [Laravel 11](https://laravel.com)
* **Database:** [MySQL 8.0](https://mysql.com)
* **Frontend:** [Tailwind CSS v4](https://tailwindcss.com) (Vite v7)
* **Tools:** Composer, NPM

---

## ⚡ Local Setup Instructions

### 1. Clone the repository

git clone [https://github.com/your-username/artist-lk.git](https://github.com/your-username/artist-lk.git)
cd artist-lk


### 2. Install Dependencies

Install both the PHP and JavaScript packages required for the project:
Bash

composer install
npm install

### 3. Environment Configuration

Create your environment file and generate a unique application key:
Bash

cp .env.example .env
php artisan key:generate

### 4. Database Setup

    Create a new MySQL database named artist_lk.

    Open your .env file and update these lines with your local database details:
    Code snippet

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=artist_lk
    DB_USERNAME=root
    DB_PASSWORD=your_password

### 5. Run Migrations

Build your database tables and structure:
Bash

php artisan migrate

### 6. Start the Application

Run these commands in two separate terminal windows:

    Terminal 1 (PHP Server):
    Bash

    php artisan serve

    Terminal 2 (Vite Assets):
    Bash

    npm run dev

Your app is now live at: http://localhost:8000
📋 Key Features

    Authentication: Secure Login and Registration system.

    Task Management: Full CRUD (Create, Read, Update, Delete).

    Soft Deletes: Safety net for deleted tasks using Laravel's deleted_at.

    Task Filtering: Ability to filter tasks by date on the dashboard.

    Modern UI: A clean, responsive layout using the new Tailwind v4.