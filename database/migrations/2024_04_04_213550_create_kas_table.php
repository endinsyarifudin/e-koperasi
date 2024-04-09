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
        Schema::create('kas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('koperasi_id')->index();
            $table->dateTime('tanggal');
            $table->enum('kategori', ['pendapatan', 'pengeluaran']);
            $table->foreignId('jenis_id')->index();
            $table->string('kode_trx')->nullable();
            $table->string('uraian');
            $table->bigInteger('jumlah');
            $table->bigInteger('saldo_akhir');
            $table->foreignId('created_by')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kas');
    }
};
