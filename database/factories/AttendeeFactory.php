<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attendee;
use App\AttendenceList;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Attendee::class, function (Faker $faker) {
    return [
        'attendence_list_id' => AttendenceList::all()->random()->id,
        'name' => $faker->name,
        'ticket_id' => Str::upper(Str::random(8))
    ];
});
