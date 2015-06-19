<?php

namespace Spatie\Integration;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * The location of the application's bootstrap file
     * 
     * @var string
     */
    protected $bootstrap = __DIR__.'/../../../../bootstrap/app.php';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require $this->bootstrap;

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    public function setUp()
    {
        parent::setUp();

        $this->app->make('db')->beginTransaction();
    }

    public function tearDown()
    {
        $this->app->make('db')->rollBack();
        
        parent::tearDown();
    }
}
