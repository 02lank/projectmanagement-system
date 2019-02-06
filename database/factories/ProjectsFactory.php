<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(50),
        'deadline' => now(),
        'account_id' => App\Account::pluck('account_id')->random(),
        'team_id' => App\Team::pluck('team_id')->random(),
        'status' => '0',
    ];
});
