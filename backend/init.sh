composer install
if [ ! -f .env ]; then
  echo ".env file not found - generating one"
  cp .env.example .env
  php artisan key:generate
fi
php artisan migrate
if [ $? -ne 0 ]; then
  echo "Error: php artisan migrate command failed"
  exit 1
fi
php artisan serve --host=0.0.0.0