<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('DOB')->nullable();
            $table->date('DOD')->nullable();
            $table->string('species');
            $table->string('breed')->nullable();
            $table->string('sex')->nullable();
            $table->text('favorites')->nullable();
            $table->text('dislikes')->nullable();
            $table->text('origin_story')->nullable(); //family, how we got them, where they lived
            $table->text('locations')->nullable(); //what city they lived in.
            $table->text('description')->nullable();
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
        Schema::dropIfExists('pets');
    }
}