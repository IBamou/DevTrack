# DevTrack Setup

## Installation

### Laravel Breeze
Laravel Breeze est installé pour l'authentification.

```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
```

### Laravel Telescope
Laravel Telescope est installé pour le debugging et le monitoring.

```bash
composer require laravel/telescope --dev
php artisan telescope:install
php artisan migrate
```

### Xdebug Configuration
Xdebug est configuré dans `.vscode/launch.json` pour le debugging PHP.

Installer Xdebug via PECL :
```bash
pecl install xdebug
```

Configurer PHP (`php.ini`) :
```ini
[xdebug]
xdebug.mode=debug
xdebug.client_host=localhost
xdebug.client_port=9003
```

Configuration dans `.vscode/launch.json` :
```json
{
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for Xdebug",
            "type": "php",
            "request": "launch",
            "port": 9003,
            "pathMappings": {
                "/var/www/html": "${workspaceFolder}"
            }
        },
        {
            "name": "Launch currently open script",
            "type": "php",
            "request": "launch",
            "program": "${file}",
            "cwd": "${fileDirname}",
            "port": 9003,
            "pathMappings": {
                "/var/www/html": "${workspaceFolder}"
            }
        }
    ]
}
```