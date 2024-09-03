<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seminar_id');
            $table->unsignedBigInteger('ticket_id');
            $table->integer('quantity');
            $table->decimal('total_price', 15, 2);
            $table->string('buyer_name');
            $table->string('buyer_email');
            $table->string('buyer_phone');
            $table->string('payment_status')->default('pending');
            $table->string('payment_id')->nullable();
            $table->timestamps();
        
            $table->foreign('seminar_id')->references('id')->on('seminars')->onDelete('cascade');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
