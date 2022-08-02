<?php

/*
 * This file is part of the Laravel Modulr Auth package.
 *
 * (c) Oluwatobi Akanji <akanjioluwatobishadrach@yahoo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    
    'key' => env('MODULR_API_KEY'),

    'secret' => env('MODULR_API_SECRET'),

    'base_url' => env('MODULR_BASE_URL', 'https://api-sandbox.modulrfinance.com'),

    'live_base_route' => env('MODULR_LIVE_BASE_ROUTE', '/api-live'),

    'local_base_route' => env('MODULR_LOCAL_BASE_ROUTE', '/api-sandbox'),

];