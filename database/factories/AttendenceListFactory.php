<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AttendenceList;
use App\User;
use Faker\Generator as Faker;

$factory->define(AttendenceList::class, function (Faker $faker) {
    return [
        'organiser_id' => User::all()->random()->id,
        'name' => $faker->sentence(5),
        'start_date' => now(),
        'end_date' => now()->addDay(5)
    ];
});
