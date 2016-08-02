<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create the user and profile
        $user = factory(App\User::class)->create();
        $user->profile()->save(factory(App\Profile::class)->make());
        
        factory(App\Skill::class, 5)->create();
        factory(App\Contact::class, 8)->create();
        factory(App\Link::class, 4)->create();
        factory(App\Project::class, 7)->create();
        
    }
}
