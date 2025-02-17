# Laravel 11 Admin Template

A ready-to-use admin panel template built with Laravel 11 for quick project setup.

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js & NPM (optional)

## Quick Start

1. Clone the repository:
```bash
git clone https://github.com/steadfast-it/template-mastering-laravel-11.git
cd [project-name]
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Environment setup:
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure your database in `.env` file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. Run migrations:
```bash
php artisan migrate
```

6. Build assets:
```bash
npm run dev
```

7. Start the development server:
```bash
php artisan serve
```

## Features

- Pre-built authentication system
- User management
- Role-based access control
- Responsive admin dashboard
- Common UI components
- Form validation

## Project Structure

- `app/` - Contains controllers, models, and other PHP classes
- `resources/views/` - Blade template files
- `public/` - Static assets
- `routes/` - Application routes
- `database/` - Migrations and seeders

## Customization

- Update branding in `resources/views/layouts/`
- Modify styles in `resources/css/`
- Add new routes in `routes/web.php`

## Support

Contact the development team for support and feature requests.