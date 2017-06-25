#!/bin/bash

chmod -R 775 bootstrap/cache/
php artisan cache:clear
chmod -R 777 vendor storage

php artisan migrate
php artisan storage:link
