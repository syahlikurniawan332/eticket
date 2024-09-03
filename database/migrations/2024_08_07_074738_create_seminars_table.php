<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeminarsTable extends Migration
{
    public function up()
    {
        Schema::create('seminars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->string('location');
            $table->text('description')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seminars');
    }
}
