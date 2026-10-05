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
    Schema::create('packages', function (Blueprint $table) {
        $table->id();
        $table->string('name');            // Nama Paket (e.g. Umroh Plus Turki)
        $table->decimal('price', 15, 2);   // Harga
        $table->integer('quota');          // Sisa Kuota
        $table->date('departure_date');    // Tanggal Keberangkatan
        $table->text('description');       // Fasilitas & Detail
        $table->string('image')->nullable(); // Foto Paket
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
