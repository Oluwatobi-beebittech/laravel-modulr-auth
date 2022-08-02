<?php

/*
 * This file is part of the Laravel Modulr Auth package.
 *
 * (c) Oluwatobi Akanji <akanjioluwatobishadrach@yahoo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OluwatobiAkanji\ModulrAuth;

use Illuminate\Support\ServiceProvider;
use OluwatobiAkanji\ModulrAuth\Auth\AuthHeader;

class ModulrAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            dirname(__DIR__, 1).'/resources/config/modulr.php' => config_path('modulr.php'),
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('auth.modulr', function($app) {
            return new AuthHeader;
        });
    }
}