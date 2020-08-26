<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);

        // fake data 생성 여부
        if (! App::environment('production') && env('CREATE_FAKE_DATA') == 'true') {
            factory(App\Models\ProjectCategory::class, 23)->create();
            factory(App\Models\Project::class, 83)->create();
            factory(App\Models\Task::class, 317)->create();
        }
    }
}
