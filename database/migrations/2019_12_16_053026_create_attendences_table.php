<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('attendence_list_id');
            $table->unsignedBigInteger('attendee_id');
            $table->boolean('present')->default(false);
            $table->date('date');
            $table->timestamps();

            $table->foreign('attendence_list_id')
                ->references('id')
                ->on('attendence_lists')
                ->onDelete('cascade');

            $table->foreign('attendee_id')
                ->references('id')
                ->on('attendees')
                ->onDelete('cascade');
        });

        Artisan::call('db:seed', [
            '--class' => AttendenceSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendences');
    }
}
