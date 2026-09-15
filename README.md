# LibraryHub

LibraryHub is a simple mini library management system made with Laravel.

## Setup

### 1. Clone the project

```bash
git clone https://github.com/azankhokhar47/mini-library-management-system.git
cd mini-library
```

### 2. Install dependencies

```bash
composer install
npm install
npm run build
```

### 3. Setup environment

```bash
copy .env.example .env
php artisan key:generate
```

Then open `.env` and add your database details:

env

DB_DATABASE=mini_library
DB_USERNAME=root
DB_PASSWORD=

### 4. Setup database

```bash

php artisan migrate:fresh --seed
```

### 5. Run the project

```bash

php artisan serve
```

Then open:

http://127.0.0.1:8000


## Login Details

### Admin

Email: `Admin@library.com`
Password: `1234`

### Librarian

Email: `librarian1@library.com`
Password: `1234`

Email: `librarian2@library.com`
Password: `1234`

### Member

Email: `member1@library.com`
Password: `1234`
