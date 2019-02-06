<?php

use Faker\Generator as Faker;

$factory->define(App\Account::class, function (Faker $faker) {
    return [
        'username' => $faker->username,
        'password' => $faker->password,
        'user_id' => App\UserType::pluck('user_id')->random(),
        'accountinfo_id' => App\AccountInfo::pluck('accountinfo_id')->random(),
        'team_id' => App\Team::pluck('team_id')->random(),
    ];
});
