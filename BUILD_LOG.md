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


## Step 3: Authentication with Laravel Breeze

**Date:** 2026-10-16

### Goal
Add register, login and logout, and protect the dashboard so only logged-in users can see it.

### What I did
1. Installed Laravel Breeze with Composer (`composer require laravel/breeze --dev`).
2. Ran `php artisan breeze:install` and chose the Blade stack with Tailwind CSS.
3. Ran `npm install` and `npm run build` to compile the frontend assets.
4. Started MySQL in XAMPP, then ran `php artisan migrate` to create the auth tables.
5. Started the app with `php artisan serve` and `npm run dev`.

### Problems and fixes
- **Windows file locking during `npm install`:** the install failed because Windows kept some files in `node_modules` locked (another process was still using them).
  **Fix:** stopped running Node processes and closed anything using the project folder, deleted `node_modules`, then ran `npm install` again.
- **Node version warning:** Node 20.17.0 is slightly older than the 20.19 that this Vite version wants. The build still finished (`✓ built in 2.08s`), so I left it for now and plan to upgrade to the latest LTS.
- **7 npm vulnerabilities:** these are in development tools only. I did not run `npm audit fix --force` because it can break the setup. I'll run the safe `npm audit fix` after upgrading Node.

### How I tested it
- Registered a new account, logged out, and logged back in.
- Visited `/dashboard` while logged out and was redirected to the login page.
- Checked the `users` table in phpMyAdmin: the password is stored as a long hash, not plain text.

### What I learned
- Breeze generates the full auth flow (routes, controllers, Blade views) in a few commands.
- Laravel hashes passwords automatically, and the `auth` middleware protects routes.

### Commit
`step 3: add authentication with Laravel Breeze`
