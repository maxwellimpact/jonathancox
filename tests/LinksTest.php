<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Link;

class LinksTest extends TestCase
{
    use DatabaseMigrations;

    public function testLinksLoadInJson()
    {
        $links = factory(Link::class, 4)->create();
        
        $this->get('/links')
             ->seeJsonEquals($links->toArray());
    }
}
