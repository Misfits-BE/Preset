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
        copy(__DIR__ . '/../stubs/scss/login.scss', resource_path('assets/sass/login.scss'));
        copy(__DIR__ . '/../stubs/scss/backend.scss', resource_path('assets/sass/backend.scss'));
    }

    /**
     * Generate the authentication scaffolding 
     * 
     * @return void
     */
    protected static function scaffoldAuth(): void 
    {
        file_put_contents(app_path('Http\Controllers\HomeController.php'), static::compileControllerStubHome()); 
        file_put_contents(base_path('routes/web.php'), static::routesAuthencation(), FILE_APPEND);

        (new Filesystem)->copyDirectory(__DIR__ . '/../stubs/views', resource_path('views'));
    }

    /**
     * Compile the HomeController stub
     * --- 
     * Needed for rename the {{ namespace }} placeholder to the actual application namespace
     * 
     * @return string
     */
    protected static function compileControllerStubHome(): string 
    {
        return str_replace(
            '{{ namespace }}', 
            Container::getInstance()->getNamespace(),
            file_get_contents(__DIR__ . '/../stubs/controllers/HomeController.stub')
        );
    }

    /**
     * Implement the webpack preset scaffoliding 
     * 
     * @return void 
     */
    public static function webpackAuth(): void 
    {
        copy(__DIR__ . '/../stubs/webpack/auth.mix.js', base_path('webpack.mix.js'));
    }

    /**
     * Add the authentication scaffolding routes to the routes/web.php routes
     * 
     * @return string
     */
    protected static function routesAuthencation(): string 
    {
        return "Auth::routes();\n\nRoute::get('/home', 'HomeController@index')->name('home');\n\n";
    }
}