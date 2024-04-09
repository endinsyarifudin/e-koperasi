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
        Schema::create('neraca_items', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->foreignId('jenisneraca_id')->index();
            $table->string('akun')->nullable();
            $table->string('neraca_item');
            $table->string('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('neraca_items');
    }
};
