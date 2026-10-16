# Build Log

A short record of what I did at each step and what I learned.

## Step 1: Project setup
**Date:** 16 Oct 2026

**What I did**
- Installed a fresh Laravel project with Composer.
- Created a MySQL database called `job_tracker` in phpMyAdmin (XAMPP).
- Connected Laravel to MySQL by editing `.env`.
- Ran `php artisan migrate` and checked that the tables were created.
- Started Git and pushed the project to GitHub.

**What I learned**
- `.env` holds settings and passwords for my computer, so it must never be committed. Laravel's `.gitignore` already excludes it.
- `php artisan migrate` creates the database tables from the migration files.

**Problems and fixes**
- The `mysql` command wasn't recognized in PowerShell. XAMPP's MySQL isn't on the Windows PATH, so I used phpMyAdmin instead.

## Step 2: Database design
**What I did**
- Created the `JobApplication` model and its migration with `php artisan make:model JobApplication -m`.
- Defined the `job_applications` table: company, job title, URL, location, status, applied date and notes.
- Linked each application to a user with a foreign key.
- Added the relationship in both models (`belongsTo` and `hasMany`).
- Tested it in Tinker by creating a user and an application.

**What I learned**
- `foreignId('user_id')->constrained()` creates the link between two tables, and `cascadeOnDelete()` removes a user's applications if the user is deleted.
- `$fillable` lists which fields can be mass-assigned, which protects against unwanted data being saved.
- An index on `user_id` and `status` speeds up queries that filter by them.
- `belongsTo` and `hasMany` are two sides of the same relationship.
