curl -Ss getcomposer.org/installer | php
php composer.phar global require laravel/installer
laravel new blog
php artisan key:generate
php artisan serve
