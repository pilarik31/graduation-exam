# PMS System
## ..and my graduation exam

Copy `.env.example` to `.env` and fill out the required values.

If you want to use OAuth2 from GitHub, fill out those values too.

Point `myapp.loc` to `127.0.0.1` in your hosts file.

```
composer install
npm install
npx mix
// Following commands in your PHP docker container.
php artisan key:generate
php artisan migrate
php artisan db:seed
```

or run `sudo make install`

At `/routes` you have pretty-printed routes of the app.

There is BrowserSync installed, so if you run `npm run watch`, the site will be autorefreshed.
