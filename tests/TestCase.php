<?php

/*
 * This file is part of the Laravel Modulr Auth package.
 *
 * (c) Oluwatobi Akanji <akanjioluwatobishadrach@yahoo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace OluwatobiAkanji\ModulrAuth\Tests;

use OluwatobiAkanji\ModulrAuth\ModulrAuthServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    parent::setUp();
  }

  protected function getPackageProviders($app)
  {
    return [
      ModulrAuthServiceProvider::class,
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    $app['config']->set('modulr.key', 'KNOWN-TOKEN');
    $app['config']->set('modulr.secret', 'NzAwZmIwMGQ0YTJiNDhkMzZjYzc3YjQ5OGQyYWMzOTI=');
  }
}
