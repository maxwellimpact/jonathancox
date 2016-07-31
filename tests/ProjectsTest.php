<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Project;

class ProjectsTest extends TestCase
{
    use DatabaseMigrations;

    public function testProjectsLoadInJson()
    {
        $projects = factory(Project::class, 4)->create();
        
        $this->get('/projects')
             ->seeJsonEquals($projects->toArray());
    }
}
