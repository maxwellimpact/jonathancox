<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Skill;
use App\User;

class SkillsTest extends TestCase
{
    use DatabaseMigrations;
  
    public function testSkillsLoadInJson()
    {
        $skills = factory(Skill::class, 4)->create();
        
        $this->get('/skills')
             ->seeJsonEquals($skills->toArray());
    }
    
    public function testAdminCanAddSkill()
    {
        $admin = factory(User::class)->create([
            'email' => config('app.admin')
        ]);
        
        $skill = factory(Skill::class)->make();
        
        $this->actingAs($admin)
             ->post('/skills', $skill->toArray())
             ->seeJsonEquals(['success' => true]);
    }

    public function testNonAdminCantAddSkill()
    {
        $user = factory(User::class)->create();
        $skill = factory(Skill::class)->make();
        
        $this->actingAs($user)
             ->post('/skills', $skill->toArray())
             ->seeStatusCode(403);
    }
    

}
