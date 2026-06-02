# Deploy to Railway

This repository can be deployed to Railway using Docker.

## Build files
- `Dockerfile` builds the Laravel app with PHP/Apache, Composer dependencies, and Vite assets.
- `entrypoint.sh` generates `APP_KEY` and caches config at container startup.
- `.dockerignore` keeps the build context small.

## Railway deployment steps

1. Connect this GitHub repository to Railway.
2. Add a MySQL plugin to the Railway project.
3. In Railway environment variables, set at least:
   - `APP_ENV=production`
   - `APP_DEBUG=false`
   - `APP_URL=<your-railway-url>`
   - `APP_KEY=<generated-app-key>`
   - `DB_CONNECTION=mysql`
   - `DB_HOST=<railway-mysql-host>`
   - `DB_PORT=<railway-mysql-port>`
   - `DB_DATABASE=<railway-mysql-database>`
   - `DB_USERNAME=<railway-mysql-username>`
   - `DB_PASSWORD=<railway-mysql-password>`

4. If you prefer using `DB_URL`, set it to the full connection string:
   `mysql://username:password@host:port/database`
5. If you do not have `APP_KEY`, generate one locally with:
   `php artisan key:generate --show`

## Post-deploy

After the app is running, run migrations using the Railway shell:

```bash
php artisan migrate --force
```

If you want the application to use file sessions instead of database sessions, set:

```env
SESSION_DRIVER=file
```

## Notes

- Railway will build the repo using the `Dockerfile` from the project root.
- The app is served by Apache inside the container.
- Keep sensitive values out of the repo by using Railway environment variables.
