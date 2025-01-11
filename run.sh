/root/.config/herd-lite/bin/composer install --no-interaction --optimize-autoloader --ignore-platform-req=ext-dom --ignore-platform-req=ext-xml
echo "Packages installed"
php artisan key:generate --force
php artisan db:seed --force
php artisan cache:clear
php artisan migrate --force
npm install
npm run build
