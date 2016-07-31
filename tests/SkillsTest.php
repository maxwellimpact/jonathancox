<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Skill;

class SkillsTest extends TestCase
{
    use DatabaseMigrations;
  
    public function testSkillsLoadInJson()
    {
        $skills = factory(Skill::class, 4)->create();
        
        $this->get('/skills')
             ->seeJsonEquals($skills->toArray());
    }
    
}
