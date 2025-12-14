<?php

namespace MrShaneBarron\Dropdown;

use Illuminate\Support\ServiceProvider;

class DropdownServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/dropdown.php', 'ld-dropdown');
    }

    public function boot(): void
    {
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\Livewire::component('ld-dropdown', Livewire\Dropdown::class);
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ld-dropdown');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/dropdown.php' => config_path('ld-dropdown.php'),
            ], 'ld-dropdown-config');
        }
    }
}
