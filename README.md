# Simple Todo app
## Features

1. Create, delete and update todo
2. Set todo to "Done"
3. Reorder tasks
4. Show dates when todo was created
5. Login functionality
6. Nested tasks. (Big task can have multiple sub-tasks)
7. Quick entry. A text field when a text is written and hit "Enter" a new task is created

## Use these credentials to login
* Email: john.doe@gmail.com
* Password: 123456789

## Deployment
1. Clone this repository into your server folder.
2. Create a new database in postgres.
3. In the root folder of the project rename file .env.example to .env
and specify environment variables:
    * Set `DB_CONNECTION` to `pgsql`
    * Set database name
    * Set database user
    * Set database user password
    * Set `APP_URL`
    * Set `APP_DEBUG` to `false`
    * Set `APP_ENV` to `production`
4. After configuring database, run migrations with `php artisan migrate`
5. After migrating tables, run seeders with `php artisan db:seed`
### Server configuration
#### Nginx
If you are deploying your application to a server that is running Nginx, you may use the following configuration file as a starting point for configuring your web server. Most likely, this file will need to be customized depending on your server's configuration. If you would like assistance in managing your server, consider using a service such as [Laravel Forge](https://forge.laravel.com):

```server {
     listen 80;
     server_name example.com;
     root /example.com/public;
 
     add_header X-Frame-Options "SAMEORIGIN";
     add_header X-XSS-Protection "1; mode=block";
     add_header X-Content-Type-Options "nosniff";
 
     index index.html index.htm index.php;
 
     charset utf-8;
 
     location / {
         try_files $uri $uri/ /index.php?$query_string;
     }
 
     location = /favicon.ico { access_log off; log_not_found off; }
     location = /robots.txt  { access_log off; log_not_found off; }
 
     error_page 404 /index.php;
 
     location ~ \.php$ {
         fastcgi_pass unix:/var/run/php/php7.2-fpm.sock;
         fastcgi_index index.php;
         fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
         include fastcgi_params;
     }
 
     location ~ /\.(?!well-known).* {
         deny all;
     }
 }
```

### Laravel documentation for deployment
Please refer to the official [laravel documentation for deployment](https://laravel.com/docs/5.7/deployment) for additional optimization options

