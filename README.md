## A simple PHP CRUD Application that interacts with a MySQL database

This application is to showcase my experiance with PHP and MySQL. I am using 
Laravel/Vue as a framework. This Laravel repo includes additional features that 
do not come with the standard installation. 

#### Additional Sail Features

- CRON: The sail docker files include the installation of `crond`
- SUPERVISORD ADDITIONS: Additionally, there are workers added to the `supervisiord.conf` file to run horizon and the laravel scheduler cron job in the background of the `laravel.test` container. This is why its important to build the sail docker in step 4.

### Installation
1. Clone the project into your local folder

```
git clone https://github.com/Burchwell/LaravelExampleApp.git
```
2. Change folder permissions
```
sudo find . -type f -exec chmod 664 {} \;   
sudo find . -type d -exec chmod 775 {} \;
```
3. Install Composer Packages
```
composer install
```
4. Build docker environment
```
sail build --no-cache
```
5. Build docker environment
```
php artisan migrate --seed
-----------------------  OR   ------------------------------
php artisan migrate:refresh --seed (If updating db)
```

6. Visit Localhost
http://localhost
## Additional Tools
## Telescope
http://localhost/telescope Local Development Tool

http://localhost/horizon Redis Queue Management Dashboard


### Linting
<a href="https://github.com/PHP-CS-Fixer/PHP-CS-Fixer">PHP-CS-Fixer</a> with default settings is used for linting 

- <b>Dry Run:</b> Execute `./composer sniff` within the `./app` folder.
- <b>Lint:</b> Execute `./composer lint` within the `./app` folder.

### Static Analysis
Execute `./composer psalm` for static code analysis within the `./app` folder.

### Code Coverage
Code coverage will be exported as html into the `./coverage` folder. To create/update code coverage 
execute `./composer coverage` within the `./app` folder.


