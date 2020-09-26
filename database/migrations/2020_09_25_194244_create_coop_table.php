<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coops', function (Blueprint $table) {
            $table->id();
            $table->integer('inside_humidity')->nullable();
            $table->integer('inside_temperature')->nullable();
            $table->integer('outside_humidity')->nullable();
            $table->integer('outside_temperature')->nullable();
            $table->integer('door_locked')->nullable();
            $table->enum('battery_status', ['Not Charging','Bad Battery','Charging','NTC Fault'])->nullable();
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
        Schema::dropIfExists('coop');
    }
}
