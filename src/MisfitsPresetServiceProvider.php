<?php 

namespace Misfits\Preset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Console\PresetCommand;

/**
 * Class MisfitsPresetServiceProvider
 * 
 * @author      Tim Joosten <tim@activisme.be>
 * @copyright   Tim Joosten
 * @package     Misfits\Preset
 */
class MisfitsPresetServiceProvider extends ServiceProvider
{
    /**
     * Boot the package services
     * 
     * @return void
     */
    public function boot(): void 
    {
        /**
         * Artisan macro for 'php artisan preset misfits'
         * 
         * @param  mixed $command The artisan command variable that handles the output.
         * @return void
         */
        PresetCommand::macro('misfits', function ($command): void {
            MisfitsPreset::install(); 

            $command->info('Misfits scaffolding installed successfully.'); 
            $command->info('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });

        /**
         * Artisan macro for 'php artisan preset misfits-auth'
         * 
         * @param  mixed $command The artisan command variable that handles the output.
         * @return void 
         */
        PresetCommand::macro('misfits-auth', function ($command): void {
            MisfitsPreset::installAuth(); 

            $command->info('Misfits scaffolding with auth views installed successfully.');
            $command->info('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }
}