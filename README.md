1. clone project
2. cd into project
3. composer install
4. rename .env.example to .env
5. run php artisan key:generate
6. create database and set dbname, port, user, password in .env
7. run php artisan migrate
8. in resources/views/create.blade.php change the OPENAI Bearer token to your token (line 49)
8. php artisan serve
