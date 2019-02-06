<?php

use Faker\Generator as Faker;

$factory->define(App\ProjectTask::class, function (Faker $faker) {
    return [
        'task_id' => App\Task::pluck('task_id')->random(),
        'project_id' => App\Project::pluck('project_id')->random(),
    ];
});
