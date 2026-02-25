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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nasabah_id')->constrained('nasabahs')->cascadeOnDelete();
            
            //total tiap sampah
            $table->bigInteger('grand_total_kotor')->default(0);
            $table->bigInteger('grand_total_nasabah')->default(0);
            $table->bigInteger('grand_total_bank')->default(0);
            $table->bigInteger('grand_total_pajak')->default(0);

            
            $table->date('transaction_date')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
