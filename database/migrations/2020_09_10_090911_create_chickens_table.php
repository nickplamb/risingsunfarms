<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChickensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chickens', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('DOB');
            $table->date('DOD')->nullable();
            $table->string('egg_color');
            $table->string('breed');
            $table->text('comments')->nullable();
            $table->string('photo_url')->nullable();
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
        Schema::dropIfExists('chickens');
    }
}
