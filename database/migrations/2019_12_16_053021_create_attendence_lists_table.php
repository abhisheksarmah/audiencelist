<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendenceListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendence_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('organiser_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('organiser_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Artisan::call('db:seed', [
            '--class' => AttendenceListSeeder::class
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendence_lists');
    }
}
