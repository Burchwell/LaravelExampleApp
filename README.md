## A simple PHP CRUD Application that interacts with a MySQL database

This application is to showcase my experiance with PHP and MySQL. I am using 
Laravel/Vue as a framework. This Laravel repo includes additional features that 
do not come with the standard installation. 

#### Features Included

- CRON: The sail docker files include the installation of `cron`
- SUPERVISORD ADDITIONS: Additionally, there are additional workers added to the `supervisiord.conf` file to run horizon and the laravel scheduler cron job in the background of the `laravel.test` container.

###  Installation
1. Execute `./composer install` to install required packages.
2. Execute `./sail build --no-cache` to build the docker environment.
3. Execute `./sail up -d` to run the docker containers in the background
4. Execute `./npm install` to install the frontend packages
5. Execute `./npm run dev` to run the frontend in development mode

## Additional Tools
### Linting
<a href="https://github.com/PHP-CS-Fixer/PHP-CS-Fixer">PHP-CS-Fixer</a> with default settings is used for linting 

- <b>Dry Run:</b> Execute `./composer sniff` within the `./app` folder.
- <b>Lint:</b> Execute `./composer lint` within the `./app` folder.

### Static Analysis
Execute `./composer psalm` for static code analysis within the `./app` folder.

### Code Coverage
Code coverage will be exported as html into the `./coverage` folder. To create/update code coverage 
execute `./composer coverage` within the `./app` folder.


