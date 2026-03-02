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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();

            //nota sampah
            $table->foreignId('transaction_id')->constrained('transactions')->cascadeOnDelete();

            //sampah yang disetor
            $table->foreignId('sampah_id')->constrained('sampahs')->cascadeOnDelete();

            //detail hitungan
            $table->integer('jumlah')->default(1);
            $table->float('berat')->default(1);
            $table->integer('harga_per_kg')->nullable();
            $table->bigInteger('subtotal'); // jumlah * berat * harga
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
