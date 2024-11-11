<?php

namespace Tests;

use JetBrains\PhpStorm\NoReturn;
use Laravel\Pulse\PulseServiceProvider;
use Robertogallea\PulseApi\PulseAPIServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    #[NoReturn]
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function getPackageProviders($app)
    {
        return [
            PulseAPIServiceProvider::class,
            PulseServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }
}
