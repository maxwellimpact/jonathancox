<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use App\Profile;

class LandingTest extends TestCase
{
    use DatabaseMigrations;
    
    public function testLandingPageExistsWithMyInfo()
    {
        $user = factory(User::class)->create();
        $profile = factory(Profile::class)->make();
        
        $user->profile()->save($profile);
        
        $this->visit('/')
             ->see($user->name)
             ->see($user->profile->title);
    }
}
