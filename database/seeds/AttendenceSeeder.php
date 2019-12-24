<?php

use App\Attendence;
use Illuminate\Database\Seeder;

class AttendenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Attendence::class, 100)->create();
    }
}
