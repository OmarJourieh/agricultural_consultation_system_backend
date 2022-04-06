<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('plant_id')->nullable();
            $table->integer('interval')->nullable();   //day number
            $table->string('description')->nullable();
            $table->boolean('is_repeating')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plant_schedules');
    }
}
