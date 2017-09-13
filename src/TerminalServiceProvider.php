<?php

namespace Josh\Terminal;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class TerminalServiceProvider extends ServiceProvider
{
    /**
     * publish config file into project config directory
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([

            __DIR__ . '/../config.php' => config_path( 'terminal.php' ),
        ]);
    }

    /**
     * Register terminal command singleton
     * and set configs for terminal
     *
     * @author Alireza Josheghani <josheghani.dev@gmail.com>
     * @since 13 Sep, 2017
     */
    public function register()
    {
        $this->app->singleton('terminal', function (Application $app){

            $aliases = config('terminal.aliases');

            return $app->make(Command::class)->aliases($aliases);
        });
    }
}