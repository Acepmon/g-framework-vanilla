# G-Framework суулгах заавар

1. [XAMPP](https://www.apachefriends.org/index.html) суулгах (PHP 7.2+ хувилбар)
2. [Composer](https://getcomposer.org/download/) суулгах. Windows үйлдлийн систем дээр Composer-Setup.exe ажлуулвал тохиромжтой.
3. Composer суусан эсэхийг шалгахад дараах command ажлах ёстой.
```
composer -V
```
4. [Server Requirements](https://laravel.com/docs/5.8/installation#server-requirements) дээр заасан PHP extension тохиргоог **php.ini** файл дотроос тохируулж өгөх
5. MySQL дээр шинээр database, user үүсгэх
```
CREATE DATABASE g-framework CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'g-framework'@'%' IDENTIFIED BY 'g-framework';
GRANT ALL PRIVILEGES ON g-framework.* TO 'g-framework'@'%';
FLUSH PRIVILEGES;
```
6. Project clone хийж авах
```
git clone https://github.com/Acepmon/g-framework.git
```
7. Project-н шаардлагатай composer library татаж авах
```
cd g-framework
composer install
```
8. .env файл үүсгэж, тохируулга хийх
```
cp .env.example .env
php artisan key:generate
```
9. .env файл нээж database-тай холбогдох тохиргоог оруулах. Зааврын дагуу database үүсгэсэн бол дараахаар тохиргоог солих
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=g-framework
DB_USERNAME=g-framework
DB_PASSWORD=g-framework
```
10. Database-тай холбогдож байгаа эсэхийг шалгахад дараах command ажилж байх ёстой.
```
php artisan migrate:status
```
11. Project ажлуулах
```
php artisan serve
```
