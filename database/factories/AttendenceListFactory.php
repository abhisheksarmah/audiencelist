<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AttendenceList;
use App\User;
use Faker\Generator as Faker;

$factory->define(AttendenceList::class, function (Faker $faker) {
    return [
        'organiser_id' => factory(User::class)->create()->id,
        'name' => $faker->sentence(5)
    ];
});
