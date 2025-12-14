<?php

namespace MrShaneBarron\Dropdown;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class DropdownServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ld-dropdown.php', 'ld-dropdown');
    }

    public function boot(): void
    {
        Livewire::component('ld-dropdown', Livewire\Dropdown::class);
        $this->loadViewComponentsAs('ld', [View\Components\Dropdown::class]);
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-dropdown');

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config/ld-dropdown.php' => config_path('ld-dropdown.php')], 'ld-dropdown-config');
            $this->publishes([__DIR__ . '/../resources/views' => resource_path('views/vendor/ld-dropdown')], 'ld-dropdown-views');
        }
    }
}
