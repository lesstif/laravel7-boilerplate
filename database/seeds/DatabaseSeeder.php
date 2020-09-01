<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $maxProjectsPerProjectCategory = 7;
    private $maxTasksInProject = 43;

    /**
     * Seed the application's database.
     *
     * @param \Faker\Generator $faker
     *
     * @return void
     */
    public function run(\Faker\Generator $faker)
    {
        $this->call(RolePermissionSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TaskStatusSeeder::class);

        // fake data 생성 여부
        if (! App::environment('production') && env('CREATE_FAKE_DATA') == 'true') {
            $project_categories = factory(App\Models\ProjectCategory::class, 23)->create();

            $project_categories->random()
                ->each(function($project_category) use ($faker ) {
                    $project_category->projects()
                        ->saveMany(
                            factory(\App\Models\Project::class)
                            ->times($faker->numberBetween(1, $this->maxProjectsPerProjectCategory))
                            ->make()
                        )->each(function ($project) use ($faker) {
                            $project->tasks()
                                ->saveMany(
                                    factory(\App\Models\Task::class)
                                        ->times($faker->numberBetween(1, $this->maxTasksInProject))
                                        ->make()
                            );
                        });
                });
            //factory(App\Models\Project::class, 83)->create();
            //factory(App\Models\Task::class, 317)->create();
        }
    }
}
