<?php 

namespace Misfits\Preset; 

use Illuminate\Container\Container; 
use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\Console\Presets\Preset; 

/**
 * Class MisiftsPreset 
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   Tim Joosten
 * @package     Misfits\Preset
 */
class MisfitsPreset
{
    use BackendPresetFunctions, FrontendPresetFunctions; 

    /**
     * Install the general preset 
     * 
     * @return void 
     */
    public static function install(): void
    {
        static::updateSassFrontend(); 
        static::updateBootstrapping();
        static::updateWelcomePage();
    }

    /**
     * Install the authentication preset scaffolding. 
     * 
     * @return void
     */
    public static function installAuth(): void 
    {
        static::install(); 
        static::scaffoldAuth();
        static::updateSassBackend();
    }
}