<?php

namespace App\Modules\Account\Providers;

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
        $this->loadTranslationsFrom(module_path('account', 'Resources/Lang', 'app'), 'account');
        $this->loadViewsFrom(module_path('account', 'Resources/Views', 'app'), 'account');
        $this->loadMigrationsFrom(module_path('account', 'Database/Migrations', 'app'), 'account');
        $this->loadConfigsFrom(module_path('account', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('account', 'Database/Factories', 'app'));
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
