<?php

use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $task_statuses = [
            'Backlog', 'Open', 'In Progress', 'In Review', 'Done',
        ];

        foreach ($task_statuses as $status) {
            \App\TaskStatus::create(['name' => $status]);
        }

    }
}
