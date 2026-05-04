# Installation Guide

## Prerequisites

- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL ou SQLite
- Git

## Installation Steps

### 1. Clone the repository

```bash
git clone <repository-url>
cd DevTrack
```

### 2. Installer les dépendances PHP

```bash
composer install
```

### 3. Configurer l'environnement

```bash
cp .env.example .env
```

Modifier le fichier `.env` avec les informations de connexion à la base de données :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=devtrack
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Générer la clé d'application

```bash
php artisan key:generate
```

### 5. Créer la base de données

```bash
CREATE DATABASE devtrack;
```

### 6. Lancer les migrations

```bash
php artisan migrate
```

### 7. Installer les dépendances frontend

```bash
npm install
```

### 8. Lancer le serveur

```bash
# Terminal 1 - Serveur Laravel
php artisan serve

# Terminal 2 - Vite (frontend)
npm run build
npm run dev
```

L'application sera accessible à `http://127.0.0.1:8000`

## Commandes utiles

```bash
# Réinitialiser la base de données
php artisan migrate:fresh --seed

# Vider les caches
php artisan optimize:clear
```
