<?php

namespace NikParser;

use Illuminate\Support\ServiceProvider;

/**
 * Class NikParserServiceProvider
 * @package NikParser
 */
class NikParserServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('nikParser', NikParser::class);
    }
}