<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('Email')->unique();
            $table->string('Password');
            $table->string('Name');
            $table->bigInteger('Specialization_id')->unsigned();
            $table->foreign('Specialization_id')->references('id')->on('specializations')->onDelete('cascade');
            $table->bigInteger('Gender_id')->unsigned();
            $table->foreign('Gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->date('Joining_Date');
            $table->text('Address')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};
