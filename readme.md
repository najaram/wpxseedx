## Wpxseedx

A simple script that seeds wp_posts table. This script uses the <a href="https://v2.wp-api.org/">WP Rest Api</a> to
store posts and it requires to have the <a href="https://github.com/WP-API/Basic-Auth">Basic Authentication Handler</a> plugin for authentication.

### How to use
- <code>cp .env.example .env</code>
- Then open .env file and add database credentials and wp admin logins
```php
DB_HOST=127.0.0.1
DB_NAME=wordpress
DB_USER=homestead
DB_PASS=secret

APP_URL=wpurl
APP_USERNAME=admin
APP_PASSWORD=admin
```

- cd to directory
- run <code>php wpx seed </code> will add (10) default items
- <code>php wpx seed -h</code> to see options

I just used this on one project and to play around a bit with the 
console component.

