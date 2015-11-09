<?php

namespace Spatie\Integration;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * The applications base path. This assumes that this package is installed with composer.
     * 
     * @var string
     */
    protected $basePath = __DIR__.'/../../../..';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        file_put_contents($this->basePath.'/storage/database.sqlite', null);

        $app = require $this->basePath.'/bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    public function setUp()
    {
        parent::setUp();

        $this->artisan('migrate');
    }
}
