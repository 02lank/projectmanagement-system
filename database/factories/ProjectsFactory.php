<?php

use Faker\Generator as Faker;

$factory->define(App\Modules\Project\Models\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(50),
        'deadline' => now(),
        'account_id' => App\Modules\Account\Models\Account::pluck('account_id')->random(),
        'team_id' => App\Team::pluck('team_id')->random(),
        'status' => '0',
    ];
});
