#!/bin/sh

cd /app
php artisan migrate --force
php artisan serve --host=0.0.0.0 --port=8000
