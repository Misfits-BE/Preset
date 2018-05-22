<?php 

namespace Misfits\Preset\Traits;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Container\Container; 

/**
 * Trait BackendPresetFunctions 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   Tim Joosten
 * @package     Misfits\Preset\Traits
 */
trait BackendPresetFunctions
{
    /**
     * Generate the SCSS for the authentication scaffolding 
     * 
     * @return void
     */
    protected static function updateSassBackend(): void 
    {
        copy(__DIR__ . '/../stubs/scss/backend.scss', resource_path('assets/sass/backend.scss'));
    }

    /**
     * Generate the authentication scaffolding 
     * 
     * @return void
     */
    protected static function scaffoldAuth(): void 
    {
        file_put_contents(app_path('Http\Controllers\HomeController.php'), static::compileControllerStub()); 
        file_put_contents(base_path('routes/web.php'), static::routesAuthencation(), FILE_APPEND);

        (new Filesystem)->copyDirectory(__DIR__ . '/../stubs/views', resource_path('views'));
    }

    /**
     * Compile the HomeController stube
     * --- 
     * Needed for rename the {{ namespace }} placeholder to the actual application namespace
     * 
     * @return void
     */
    protected static function compileControllerStub(): string 
    {
        return str_replace(
            '{{ namespace }}', 
            Container::getInstance()->getNamespace(),
            file_get_contents(__DIR__ . '/../stubs/controllers/HomeController.stub')
        );
    }

    /**
     * Add the authentication scaffolding routes to the routes/web.php routes
     * 
     * @return void
     */
    protected static function routesAuthencation(): string 
    {
        return "
            // Authentication Routes\n
            Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');\n
            Route::post('login', 'Auth\LoginController@login');\n
            Route::post('logout', 'Auth\LoginController@logout')->name('logout');\n\n

            // Registration Routes\n
            Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');\n
            Route::post('register', 'Auth\RegisterController@register');\n\n

            // Password Reset Routes\n
            Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');\n
            Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');\n
            Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');\n
            Route::post('password/reset', 'Auth\ResetPasswordController@reset');\n
            Route::get('/home', 'HomeController@index')->name('home');\n\n
        ";
    }
}