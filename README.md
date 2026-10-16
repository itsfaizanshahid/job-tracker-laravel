# Job Application Tracker (Laravel)

A web app for tracking job applications: add each application, update its status as you move through the process, and see your progress at a glance.

> Status: in development. See the checklist below for what is done.

## Features

- [x] Project setup with MySQL
- [x] Database design: users and job applications
- [x] Register, login and logout
- [ ] Add, view, edit and delete applications
- [ ] Search, filter by status and pagination
- [ ] Dashboard with counts per status
- [ ] JSON API endpoints
- [ ] Automated tests

## Tech Stack

- PHP and Laravel
- MySQL
- Blade and Tailwind CSS
- Git and GitHub

## Screenshots

Add screenshots here once the pages are built:

![Dashboard](docs/screenshots/dashboard.png)

## Getting Started

### Requirements

- PHP 8.2 or higher
- Composer
- MySQL (for example via XAMPP)
- Git

### Installation

```bash
git clone https://github.com/itsfaizanshahid/job-tracker-laravel.git
cd job-tracker-laravel
composer install
cp .env.example .env
php artisan key:generate
```

Create an empty MySQL database named `job_tracker`, then set your database details in `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=job_tracker
DB_USERNAME=root
DB_PASSWORD=
```

Run the migrations and start the server:

```bash
php artisan migrate
php artisan serve
```

Open http://127.0.0.1:8000 in your browser.

## Database Overview

- `users`: registered users
- `job_applications`: company, job title, URL, location, status, applied date and notes. Each application belongs to one user.

Allowed statuses: `wishlist`, `applied`, `interview`, `offer`, `rejected`.

## Roadmap

- Authentication
- Application management (CRUD, search, filters)
- Dashboard
- API endpoints
- Tests
- Deployment

## Author

Faizan Shahid

- GitHub: [itsfaizanshahid](https://github.com/itsfaizanshahid)
- LinkedIn: [its-faizan-shahid](https://www.linkedin.com/in/its-faizan-shahid)
