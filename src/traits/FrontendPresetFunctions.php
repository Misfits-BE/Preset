<?php 

namespace Misfits\Preset\Traits; 

use Illuminate\Filesystem\Filesystem;

/**
 * Trait FrontendPresetFunctions 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   Tim Joosten
 * @package     Misfits\Preset\Traits
 */
trait FrontendPresetFunctions 
{
    /**
     * Update the SCSS scaffolding for the frontend page's taht doesn't require authentication
     * 
     * @return void
     */
    protected static function updateSassFrontend(): void 
    {
        (new Filesystem)->delete(resource_path('assets/sass/app.scss'));
        (new Filesystem)->delete(public_path('assets/sass/app.css'));

        copy(__DIR__ . '/../stubs/scss/frontend.scss', resource_path('assets/sass/frontend.scss'));
    }

    /**
     * Implement the webpack preset scaffoliding 
     * 
     * @return void 
     */
    protected static function webpack(): void 
    {
        copy(__DIR__ . '/../stubs/webpack/normal.mix.js', base_path('webpack.mix.js'))
    }

    /**
     * Update the bootstrapping process and JavaScript files in the scaffolding 
     * 
     * @return void 
     */
    protected static function updateBootstrapping(): void 
    {
        (new Filesystem)->delete(resource_path('assets/js/app.js')); 
        (new FileSystem)->delete(public_path('js/app.js'));

        copy(__DIR__ . '/../stubs/js/frontend.js', resource_path('assets/js/frontend.js'));
    }

    /**
     * Update the bootstrapping process and Javascript for the authentication scaffolding
     */
    protected static function updateBootstrappingAuth() 
    {
        copy(__DIR__ . '/../stubs/js/backend.js', resource_path('assets/js/backend.js'));
        copy(__DIR__ . '/../stubs/js/login.js', resource_path('assets/js/login.js'));
    }

    /**
     * Update the welcome page for the application scaffolding
     * 
     * @return void
     */
    protected static function updateWelcomePage(): void 
    {
        (new Filesystem)->delete(resource_path('views/welcome.blade.php'));
        
        copy(__DIR__ . '/../stubs/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }
}