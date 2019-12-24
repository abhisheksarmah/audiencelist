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
        $value = rand(1, 30);
        factory(Attendence::class, 30)->create([
            'attendence_list_id' => $value
        ]);
    }
}
