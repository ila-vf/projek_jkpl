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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')->onDelete('cascade')->constrained();
            $table->foreignId('outlet_id')->constrained()->onDelete('cascade');
            $table->foreignId('invoice_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('transaksi_code');
            $table->date('tgl_diantar');
            $table->date('tgl_selesai');
            $table->date('tgl_bayar')->nullable();
            $table->enum('status',['Pending','Doing','Done'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
