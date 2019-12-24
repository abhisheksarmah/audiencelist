<?php

use App\User;
use App\Attendee;
use App\Attendence;
use App\AttendenceList;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Attendee::class, 30)->create()->each(function ($attendee) {
            $attendee->attendences()->save(
                factory(Attendence::class)->make([
                    'attendee_id' => NULL,
                    'attendence_list_id' => rand(1, 10)
                ])
            );
        });
        // $this->call(UsersTableSeeder::class);
    }
}
