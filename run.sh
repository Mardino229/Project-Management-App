composer install --no-interaction --optimize-autoloader
echo "Packages installed"
php artisan key:generate --force
php artisan db:seed --force
php artisan cache:clear
php artisan migrate --force
