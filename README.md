# App to test php-mvc

1. Install VirtualHostX
2. Clone the repository
3. Create a new VirtualHostX website using the repository folder. Modify footer.php view template for the live reload script.
4. Install MySQL in a Docker container (`docker run --name my-local-mysql -p 3306:3306 -e MYSQL_ROOT_PASSWORD=set-your-password -d mysql:latest`)
5. Download phpmyadmin, modify config.inc.php using MySQL credentials from previous step
6. Create a new VirtualHostX website for phpmyadmin
7. Create the `app/config/config.php` file and assign the project constants

```sh
define(DB_HOST, 'your-host-ip');
define(DB_PORT, 3306);
define(DB_USER, 'your-user');
define(DB_PASS, 'your-password');
define(DB_NAME, 'your-db-name');

define('APPROOT', dirname(dirname(__FILE__)));
define('URLROOT', 'http://php-mvc.vhx.cloud:8080');
define('SITENAME', 'Catalin MVC');
```