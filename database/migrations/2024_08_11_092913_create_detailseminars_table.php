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
        Schema::create('detailseminars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seminar_id')->constrained()->onDelete('cascade');
            $table->string('nama_mc')->nullable();
            $table->text('bio_mc')->nullable();
            $table->text('keuntungan')->nullable();
            $table->text('info_tambahan')->nullable();
            $table->time('waktu_mulai')->nullable();
            $table->time('waktu_berakhir')->nullable();
            $table->json('foto_seminar')->nullable(); // JSON array for multiple photos
            $table->json('foto_ruangan')->nullable(); // JSON array for multiple room photos
            $table->timestamps();
        });        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailseminars');
    }
};
