<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_doctors', function (Blueprint $table) {
            $table->id('DoctorId');
            $table->string('image_path')->nullable();
            $table->text('bio')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('age');
            $table->string('gender');
            $table->string('contact');
            $table->string('email');
            $table->string('marital')->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('postal')->nullable();
            $table->string('specialization')->nullable();
            $table->string('qualification')->nullable();
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
        Schema::dropIfExists('add_doctors');
    }
};
