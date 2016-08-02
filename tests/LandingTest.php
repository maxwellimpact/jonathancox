<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class LandingTest extends TestCase
{
    public function testLandingPageExistsWithText()
    {
        $this->visit('/')
             ->see('Jonathan Cox')
             ->see('Full-Stack Developer');
    }
}
