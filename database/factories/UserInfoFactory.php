<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserInfo;
use Faker\Generator as Faker;

$factory->define(UserInfo::class, function (Faker $faker) {
    return [
        'account_id' => factory(App\User::class)->create(),
        'first_name' => 'First',
        'middle_name' => 'Middle',
        'last_name' => 'Last',
        'gender' => 'Male',
        'contact' => '09123456789',
        'address' => $faker->address
    ];
});
