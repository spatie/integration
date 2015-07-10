<?php

namespace Spatie\Integration;

abstract class FrontTestCase extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->artisan('db:seed');
    }
}
