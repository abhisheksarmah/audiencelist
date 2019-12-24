<?php

use App\AttendenceList;
use Illuminate\Database\Seeder;

class AttendenceListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AttendenceList::class, 10)->create([
            'organiser_id' => 1
        ]);
    }
}
