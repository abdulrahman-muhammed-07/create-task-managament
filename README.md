# Task Management System

## Installation

### Start The App

First Run this command to start the application.

```
make start-app
```

### The Job Queue Step

This will start the app and make the necessary first steps to run the app

Then run this command to update statistics . Important Command so the statistics would be always upd to date

```
php artisan queue:work
```

The domain of the app will be by default like that :

```
 http://127.0.0.1:8000
```

#### after the app is installed use this credentials to log in

Login Credentials

```
email: admin@converted.in
password: password
```

### Test The App

Running tests with the following Command

```
php artisan test
```
