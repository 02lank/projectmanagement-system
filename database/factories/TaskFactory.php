<?php

use Faker\Generator as Faker;

$factory->define(App\Task::class, function (Faker $faker) {
    return [
        'task_description' => $faker->text(50),
        'project_id' => App\Project::pluck('project_id')->random(),
        'status' => '0',
    ];
});
