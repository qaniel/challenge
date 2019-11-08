# DANIEL MENDOZA CHALLENGE JOBSITY

## REQUIREMENTS
- **APACHE MOD_REWRITE**
- **PHP** >= 7.2.0
- **BCMath** PHP Extension
- **Ctype** PHP Extension
- **JSON** PHP Extension
- **Mbstring** PHP Extension
- **OpenSSL** PHP Extension
- **PDO** PHP Extension
- **Tokenizer** PHP Extension
- **XML** PHP Extension
- **YARN** package manager for js
- **COMPOSER** php package manager 

## SET-UP

After cloning the project be sure the run the following commands inside
the project folder

- `composer install` to install all php dependencies
- `yarn` to install all front dependencies
- `yarn run prod` to compile front dependencies for production

Be sure that web server user have read/write access into **storage and bootstrap** directories

Copy the .env.example with `cp .env.example .env` the run `php artisan key:generate` and 
configure the following configurations

``` dotenv
    DB_CONNECTION=mysql
    DB_HOST=MY_DB_IP
    DB_PORT=MY_DB_PORT
    DB_DATABASE=MY_DB
    DB_USERNAME=MY_DB_USER
    DB_PASSWORD=MY_DB_PASSWORD
    TWITTER_CONSUMER_KEY=MY_CONSUMER_KEY
    TWITTER__CONSUMER_SECRET_KEY=MY_CONSUMER_SECRET
    TWITTER_ACCESS_KEY=MY_ACCESS_KEY
    TWITTER_ACCESS_SECRET_KEY=MY_ACCESS_SECRET
```

### DATABASE

Under directory **database** there is a sql file with a sample database 
dump you can import it into an existing db with `mysql -u my_user -p my_database < blog.sql`


### VIRTUAL HOST

Sample Virtual Host

``` apacheconfig
    <VirtualHost *:80>
        ServerAdmin dmendoza.jrtecnologia@gmail.com
        DocumentRoot "/var/www/jobsitychallenge/daniel_mendoza/public"
        ServerName daniel_mendoza.jobsitychallenge.com
        ErrorLog "/var/log/apache2/daniel-mendoza-error_log"
        CustomLog "/var/log/apache2/daniel-mendoza-access_log"
    
        <Directory "/var/www/jobsitychallenge/daniel_mendoza/public">
            Indexes FollowSymLinks MultiViews
            AllowOverride All
            Order allow,deny
            allow from all
            Require all granted
        </Directory>
    </VirtualHost>
```
