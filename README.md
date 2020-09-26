## Installation, Dev Test Task
- Go to path of your project install dependencies
```
composer install
```
- Create an empty MySQL database called "bpr"
```
CREATE DATABASE bpr CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```
- Import the sql file called 'brp.sql'
```
mysql -u{yourusername} -p{yourpass} bpr < bpr.sql
```
- Change the name of your <strong>env.example</strong> to <strong>.env</strong>
and set database and mail credentials

### Server Requirements
- Composer
- PHP 5.6.0 (PHP.ini output_buffering = on)
- MySQL 5.7.24 or equal (CHARSET: utf8mb4, COLLATE: utf8mb4_unicode_ci)
- Apache 2.4, VC11 or equal