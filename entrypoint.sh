#!/bin/sh

echo "On entry"

if [ "$RUN_MIGRATIONS" = "true" ]; then
    echo "Executing migrations..."
    php artisan migrate
else
    echo "Migrations already apply."
fi

echo "Starting app..."

exec php -S 0.0.0.0:8000 -t public
