<?php

namespace Robertogallea\PulseApi;

use Illuminate\Support\ServiceProvider;

class PulseAPIServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom($this->packagePath('config/pulse-api.php'), 'pulse-api');

        $this->loadRoutesFrom($this->packagePath('routes/api.php'));
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publish();
        }
    }

    private function packagePath(string $path)
    {
        return __DIR__."/../$path";
    }

    private function publish()
    {
        $this->publishes([$this->packagePath('config/pulse-api.php') => config_path('pulse-api.php')], 'pulse-api-config');
    }
}
