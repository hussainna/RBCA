# Laravel Roles and Permissions API

This Laravel project provides a robust implementation of roles and permissions with advanced features such as dynamic role assignment and audit trail. The system is designed to store roles and permissions in the database, and users can have multiple roles with immediate updates to their roles and permissions.

## Features

- **Roles & Permissions**: Stored in the database and manageable via API endpoints.
  - Permissions support CRUD operations at the record level.
- **Dynamic Role Assignment**: Users can have multiple roles, and changes take immediate effect without re-authentication.
- **Audit Trail**: Comprehensive auditing of who made each change, the before-and-after state, and timestamps.
- **Security & Validation**: Includes rate-limiting and protection against unauthorized access.

## Prerequisites

Before you get started, ensure you have the following installed:

- PHP (8 or higher)
- Composer
- Laravel (10 or higher)
- Postgres or another compatible database

## Setup Instructions

### 1. Clone the Repository

Clone the repository to your local machine:

```bash
git clone https://github.com/hussainna/RBCA.git
cd RBCA
```

### 2. Install Project

```bash
composer install
```

### 3. configure the database .env

```bash
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=database_name
DB_USERNAME=
DB_PASSWORD=
```

### 4. Migrate the migration files and seeders

``` bash
php artisan migrate:fresh --seed
```

### 5. Now you can run the project

```bash
php artisan serve
```
