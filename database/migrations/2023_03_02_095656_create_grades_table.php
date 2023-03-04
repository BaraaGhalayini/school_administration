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
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('note')->nullable();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('grades');
    }
};
