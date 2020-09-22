## Installation, Dev Test Task
- Go to path-to-your-project and run
```
composer install
```
- Create an empty MySQL database ex-name: "bpr"
```
mysql -u{yourusername} -p{yourpass} bpr < bpr.sql
```
- Change the name of your <strong>env.example</strong> to <strong>.env</strong>
and change the config accordingly 
### Server Requirements
- Composer
- PHP = 5.6.0
- MySQL