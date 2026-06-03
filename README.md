# Cafe Payroll System

Laravel payroll and attendance system configured for Railway deployment with MySQL.

## Railway Files Added

- `railway.json` tells Railway to build the Vite assets, run migrations/seeders before deploy, cache Laravel config/routes/views, and start the app on Railway's `$PORT`.
- `.env.example` contains production-ready Railway variables.
- Laravel migrations now create the same tables used by the app: `employees`, `users`, `attendance`, `deductions`, `payroll`, `sessions`, `cache`, and `jobs`.
- `DatabaseSeeder` creates demo employees and login accounts without duplicating data on redeploy.

## Demo Logins

Admin:

```text
Email: admin@cafe.com
Password: admin123
```

Employee:

```text
Email: miguel.santos@cafe.com
Password: password
```

All seeded employee accounts use `password`.

## Deploy To Railway

1. Push this project to GitHub.

2. Open Railway and create a new project.

3. Add a MySQL database:
   - Click `New`.
   - Choose `Database`.
   - Choose `MySQL`.

4. Add your Laravel app service:
   - Click `New`.
   - Choose `GitHub Repo`.
   - Select this repository.

5. Open the Laravel app service, then go to `Variables`.

6. Add these variables in the Raw Editor:

```env
APP_NAME="Cafe Payroll"
APP_ENV=production
APP_KEY=base64:PASTE_YOUR_GENERATED_APP_KEY_HERE
APP_DEBUG=false
APP_URL=https://your-railway-domain.up.railway.app

LOG_CHANNEL=stderr
LOG_LEVEL=error
LOG_STDERR_FORMATTER=Monolog\Formatter\JsonFormatter

DB_CONNECTION=mysql
DB_HOST=${{MySQL.MYSQLHOST}}
DB_PORT=${{MySQL.MYSQLPORT}}
DB_DATABASE=${{MySQL.MYSQLDATABASE}}
DB_USERNAME=${{MySQL.MYSQLUSER}}
DB_PASSWORD=${{MySQL.MYSQLPASSWORD}}

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=sync

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
MAIL_MAILER=log
VITE_APP_NAME="${APP_NAME}"
```

7. Generate your `APP_KEY` locally:

```bash
php artisan key:generate --show
```

Copy the printed key into Railway as `APP_KEY`.

8. Deploy the app service.

Railway will run:

```bash
npm run build
php artisan migrate --force
php artisan db:seed --force
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan serve --host=0.0.0.0 --port=${PORT}
```

9. Generate a public domain:
   - Open the Laravel app service.
   - Go to `Settings`.
   - Open `Networking`.
   - Click `Generate Domain`.

10. Copy the generated domain and update `APP_URL` in the Railway app service variables.

11. Redeploy after changing `APP_URL`.

12. Open the Railway domain and log in with the demo admin account.

## Local Setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run build
php artisan serve
```

For local MySQL, replace the Railway `DB_*` values in `.env` with your local database credentials.
