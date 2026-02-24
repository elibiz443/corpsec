# CORPSEC Website (PHP + MySQL + Tailwind)

## Requirements
- PHP 8+
- MySQL 5.7+ (or MariaDB 10.4+)

## Setup
1) Copy the `corpsec/` folder into your web root.

2) Create a MySQL database:

```sql
CREATE DATABASE corpsec_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

3) Configure DB credentials (choose one):
- Environment variables:
  - `CORPSEC_DB_HOST`
  - `CORPSEC_DB_NAME`
  - `CORPSEC_DB_USER`
  - `CORPSEC_DB_PASS`

OR
- Edit `config.php` defaults.

4) Ensure `uploads/` is writable by PHP.

5) Load `index.php` in the browser. Tables and starter content are created automatically on first load.

## Quick local run
From inside the `corpsec/` folder:

```bash
php -S localhost:8000
```

Then open:

`http://localhost:8000/index.php`

## Admin login
- `admin/login.php`
- Username: `supreme_admin`
- Password: `secure123`

## URLs
All navigation uses `.php` links (works everywhere). If you want clean URLs, enable Apache `mod_rewrite` and keep `.htaccess`.

Install Tailwind CSS:

```
npm install tailwindcss @tailwindcss/cli
```

Add in css/input.css:

```
@import "tailwindcss";
```

Call the following in heading part
```
<link href="<?php echo ROOT_URL; ?>/assets/css/output.css" rel="stylesheet">
```

Watch CSS:
```
npx tailwindcss -i ./assets/css/input.css -o ./assets/css/output.css --watch
```

Minify CSS:
```
npx tailwindcss -i ./assets/css/input.css -o ./assets/css/output.css --minify
```

## Uploading files:

Give permission to upload folder: 
```
chmod 0755 uploads && sudo chown -R daemon:daemon uploads
```

Push to production:
```
zip -r ../corpsec.zip . -x "uploads/*" -x "*.DS_Store" -x "README.md" -x ".gitignore" -x ".git/*"
```

Run the following SQL to re-run DB values:

```
TRUNCATE TABLE settings;
TRUNCATE TABLE services;
TRUNCATE TABLE team;
TRUNCATE TABLE testimonials;
TRUNCATE TABLE stats;
TRUNCATE TABLE partners;
```

TRUNCATE TABLE posts;
