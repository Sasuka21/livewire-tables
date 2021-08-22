<?php

namespace Superhiro\TablesLivewire;

use Illuminate\Support\ServiceProvider;
use Superhiro\App\Commands\CreateTable;

class TableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([CreateTable::class]);
        }

        $this->loadViewsFrom(__DIR__ . '/resources/views', 'livewire-tables');
        $this->publishes([__DIR__ . '/config/livewire-tables.php' => config_path('livewire_table.php')], 'table-config');
        $this->publishes([__DIR__ . '/resources/views/templates' => resource_path('views/vendor/livewire-tables')], 'table-views');


    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/livewire-tables.php', 'livewire-tables');
    }

}
