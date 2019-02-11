<?php

use Faker\Generator as Faker;

$factory->define(App\Modules\Task\Models\Task::class, function (Faker $faker) {
    return [
        'task_description' => $faker->text(50),
        'project_id' => App\Modules\Project\Models\ Project::pluck('project_id')->random(),
        'status' => '0',
    ];
});
