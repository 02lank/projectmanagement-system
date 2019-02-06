<?php

namespace App\Modules\Projecttask\Providers;

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
        $this->loadTranslationsFrom(module_path('projecttask', 'Resources/Lang', 'app'), 'projecttask');
        $this->loadViewsFrom(module_path('projecttask', 'Resources/Views', 'app'), 'projecttask');
        $this->loadMigrationsFrom(module_path('projecttask', 'Database/Migrations', 'app'), 'projecttask');
        $this->loadConfigsFrom(module_path('projecttask', 'Config', 'app'));
        $this->loadFactoriesFrom(module_path('projecttask', 'Database/Factories', 'app'));
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
