<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attendee;
use App\Attendence;
use App\AttendenceList;
use Faker\Generator as Faker;

$factory->define(Attendence::class, function (Faker $faker) {
    return [
        'attendence_list_id' => factory(AttendenceList::class)->create()->id,
        'attendee_id' => factory(Attendee::class)->create()->id,
        'present' => $faker->boolean(),
        'date' => now()
    ];
});
