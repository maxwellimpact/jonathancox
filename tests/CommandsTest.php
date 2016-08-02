<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CommandsTest extends TestCase
{
    public function testCommandsListLoadsFromRouteAsJson()
    {
        $this->get("/commands")
             ->seeJsonEquals(config('commands.list'));
    }
}
