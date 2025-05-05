<?php

namespace Pelmered\Enums\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            // Add any service providers your package uses here
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Setup default database for testing
        // $app['config']->set('database.default', 'testing');
    }
}
