<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('attendence_list_id');
            $table->string('name', 50);
            $table->string('ticket_id', 15);
            $table->timestamps();

            $table->foreign('attendence_list_id')
                ->references('id')
                ->on('attendence_lists')
                ->onDelete('cascade');
        });

        Artisan::call('db:seed', [
            '--class' => AttendeeSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendees');
    }
}
