<?php

namespace App\Modules\Accountinfo\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('accountinfo', 'Resources/Lang', 'app'), 'accountinfo');
        $this->loadViewsFrom(module_path('accountinfo', 'Resources/Views', 'app'), 'accountinfo');
        $this->loadMigrationsFrom(module_path('accountinfo', 'Database/Migrations', 'app'), 'accountinfo');
        $this->loadConfigsFrom(module_path('accountinfo', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('accountinfo', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
