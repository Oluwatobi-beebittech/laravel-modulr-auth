<?php

/*
 * This file is part of the Laravel Modulr Auth package.
 *
 * (c) Oluwatobi Akanji <akanjioluwatobishadrach@yahoo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OluwatobiAkanji\ModulrAuth\Facades;

use Illuminate\Support\Facades\Facade;

class AuthHeaders extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'auth.modulr';
    }
}