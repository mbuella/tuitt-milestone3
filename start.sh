#!/bin/bash

# set permissions
chmod -R 775 bootstrap/cache/
php artisan cache:clear
chmod -R 777 vendor storage

# artisans
php artisan migrate
php artisan storage:link
