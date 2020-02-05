# G-Framework Vanilla хувилбар суулгах заавар

1. [XAMPP](https://www.apachefriends.org/index.html) суулгах (PHP 7.2+ хувилбар)
2. [Composer](https://getcomposer.org/download/) суулгах. Windows үйлдлийн систем дээр Composer-Setup.exe ажлуулвал тохиромжтой.
3. Composer суусан эсэхийг шалгахад дараах command ажлах ёстой.
```
composer -V
```
4. [Server Requirements](https://laravel.com/docs/5.8/installation#server-requirements) дээр заасан PHP extension тохиргоог **php.ini** файл дотроос тохируулж өгөх
5. MySQL дээр шинээр database, user үүсгэхэд дараах SQL query ажлуулна уу
```
CREATE DATABASE gfw CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'gfw'@'localhost' IDENTIFIED BY 'gfw';
GRANT ALL PRIVILEGES ON gfw.* TO 'gfw'@'localhost';
FLUSH PRIVILEGES;
```
6. Project clone хийж авах
```
git clone https://github.com/Acepmon/g-framework-vanilla.git
```
7. Project-н шаардлагатай composer library татаж авах
```
cd g-framework-vanilla
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
DB_DATABASE=gfw
DB_USERNAME=gfw
DB_PASSWORD=gfw
```
10. Database-тай холбогдож байгаа эсэхийг шалгахад дараах command ажилж байх ёстой.
```
php artisan migrate:status
```
11. Хэрэгтэй модуль-г идэвхжүүлж database-рүү migration болон seeder ажлуулна. Зөвхөн модуль-г сонгож идэвхжүүлж болно.
```
php artisan module:enable System
php artisan module:enable Content
php artisan module:enable Advertisement
php artisan migrate --seed
```
12. Project ажлуулах
```
php artisan serve
```
