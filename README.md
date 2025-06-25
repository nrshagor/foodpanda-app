# Foodpanda App (Laravel 12)

This is the secondary system in a multi-system login architecture. It accepts a secure login token from the `ecommerce-app` and automatically logs the user in.

## 🔧 Laravel Version

-   Laravel: **v12**

---

## 🚀 Setup Guide

### 1. Clone the Repository

```bash
git clone https://github.com/nrshagor/foodpanda-app.git
cd ecommerce-app
```

### 2. Install Dependencies

```bash
composer install
npm install
npm run build
```

### 3. Configure .env

```bash
cp .env.example .env
```

#### Update the following lines in .env:

```bash
APP_NAME=Foodpanda
APP_URL=http://foodpanda.local:8001

DB_CONNECTION=mysql
DB_DATABASE=foodpanda-app
DB_USERNAME=root
DB_PASSWORD=

SESSION_DOMAIN=.local
SESSION_COOKIE=shared_session

# Use same APP_KEY as foodpanda-app
APP_KEY=base64:YOUR_SHARED_APP_KEY

```

### 4. Generate Application Key

```bash
php artisan key:generate

```

##### ⚠️ Make sure this APP_KEY is identical to the one in ecommerce-app.

### 5. Run Migrations

```bash
php artisan migrate
```

### 6. Serve the App

```bash
php artisan serve --host=foodpanda.local --port=8001

```

##### Make sure ecommerce.local is mapped in your hosts file:

```bash
127.0.0.1 foodpanda.local

```

#### The hosts file on Windows is located here:

```bash
C:\Windows\System32\drivers\etc\hosts
```

#### Add these lines at the bottom:

```bash
127.0.0.1 ecommerce.local
127.0.0.1 foodpanda.local
```

### 🔐 Auth & SSO

-   Accepts secure login tokens from ecommerce-app
-   Automatically logs in the user if token is valid
-   Logout can be triggered via /sso-logout

### ✅ Features

-   SSO-based login (no form needed)
-   Dashboard
-   Logout endpoint callable from parent system

### 🧪 Testing

-   Log in to: http://ecommerce.local:8000

-   Ecommerce app will open: http://foodpanda.local:8001/sso-login?token=...

-   You’ll be automatically logged in if token is valid.

### 📂 Related App

Make sure to run Ecommerce App before testing this.
