start_app:
	cp .env.example .env
	composer install
	npm install
	npm run build
	php artisan optimize:clear
	php artisan key:generate
	php artisan config:cache
	php artisan migrate:fresh --seed
	php artisan serve