<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Profile;
use App\User;

class ProfileTest extends TestCase
{
    use DatabaseMigrations;
    
    public function testMyProfileReturnsCorrectlyInJson()
    {
        $user = factory(User::class)->create();
        $profile = factory(Profile::class)->make();
        
        $user->profile()->save($profile);
        
        $this->get("/profile")
             ->seeJsonEquals($user->profile->toArray());
    }
}
