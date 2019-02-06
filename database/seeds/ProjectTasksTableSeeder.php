<?php

use Illuminate\Database\Seeder;

class ProjectTasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProjectTask::class, 15)->create();
    }
}
