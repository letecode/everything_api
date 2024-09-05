# everything_api

Everything APi that you can use in any frontend App 


## Installation

Clone de project and

```bash
cd everything_api
```

install packages

```bash
composer install
```

copy env.exemple to .env

```bash
copy .env.example .env
```

use sqlite or update DB credentials to fit your needs

```bash
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

migrate the migrations

```bash
php artisan migrate
```

Test the /api/v1/items

