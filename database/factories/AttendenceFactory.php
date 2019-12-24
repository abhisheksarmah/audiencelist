<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attendee;
use App\Attendence;
use Faker\Generator as Faker;

$factory->define(Attendence::class, function (Faker $faker) {
    $attendee = Attendee::all()->random();
    return [
        'attendee_id' => $attendee->id,
        'attendence_list_id' => $attendee->attendence_list_id,
        'present' => $faker->boolean(),
        'date' => now()
    ];
});
