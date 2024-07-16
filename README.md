## Installation

Install the dependencies.

```bash
composer install
```

Then setup your .env file.

```bash
cp .env.example .env
```

And run the initial migrations.

```bash
php artisan migrate
```

## Quality assurance
Make sure none of these fails
```bash
php artisan test
```

## API documentation
You can open swagger docs `http://domain.tld/api/documentation/`.
To regenerate docs, run
```bash
php artisan l5-swagger:generate
```
