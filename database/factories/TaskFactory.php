<?php

use Faker\Generator as Faker;

$factory->define(App\Modules\Task\Models\Task::class, function (Faker $faker) {
    return [
        'task_description' => $faker->text(50),
        'status' => '0',
    ];
});
