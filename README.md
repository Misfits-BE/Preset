Laravel 5.5x Frontend Preset for the Misfits-BE organization 

Preset for [Misfits-BE](https://www.activisme.be) on a new Laravel 5.6.x project. 

## Usage 

1. Fresh install Laravel 5.6.x and `cd` to your app. 
2. Install this preset via `composer require misfits/preset`. Laravel 5.6.x and higher will automatically discover this package. No need to register the service provider. 
3. Use `php artisan preset misfits` for the basic Misfits preset OR use `php artisan preset misfits-auth` for basic preset, auth route entry and Misfits auth views in one go. (NOTE: If you run this command several times, be sure to clean up the duplicate Auth entries in `routes/web.php`)
4. `npm install`
5. `npm run dev`
6. Configure your favorite database (MySQL, SQLite etc.)
7. `php artisan migrate` to create basic user tables. 
8. `php artisan serve` (or equivalent) to run the server and test the preset