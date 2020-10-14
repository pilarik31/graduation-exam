# PMS System
## ..and my graduation exam

Copy `.env.example` to `.env` and fill out the required values.

Create a virtual host for the app.

```
composer install
npm install
php artisan key:generate
php artisan migrate
php artisan db:seed
```
At `/routes` you have pretty-printed routes of the app.

There is BrowserSync installed, so if you run `npm run watch`, the site will be autorefreshed.
