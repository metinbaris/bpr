## Installation, Dev Test Task
- Go to path-to-your-project and run
```
composer install
```
- Create an empty MySQL database called "bpr" and import bpr.sql
```
mysql -u{yourusername} -p{yourpass} bpr < bpr.sql
```
- Change the name of your <strong>env.example</strong> to <strong>.env</strong>
and change the config accordingly

### Server Requirements
- Composer
- PHP 5.6.0
- MySQL 5.7.24 or equal (CHARSET: utf8mb4, COLLATE: utf8mb4_unicode_ci)
- Apache 2.4, VC11 or equal