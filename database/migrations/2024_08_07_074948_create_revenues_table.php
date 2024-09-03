<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_revenues_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevenuesTable extends Migration
{
    public function up()
    {
        Schema::create('revenues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seminar_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });        
    }

    public function down()
    {
        Schema::dropIfExists('revenues');
    }
}

