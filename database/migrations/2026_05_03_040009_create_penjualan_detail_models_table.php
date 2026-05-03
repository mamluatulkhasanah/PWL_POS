<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('t_penjualan_detail', function (Blueprint $table) {
            $table->id('detail_id');
            $table->unsignedBigInteger('penjualan_id');
            $table->unsignedBigInteger('barang_id');
            $table->integer('harga');
            $table->integer('jumlah');
            $table->timestamps();
        }); // <--- PASTIKAN ADA INI (Tutup kurung, titik koma)
    } // <--- PASTIKAN ADA INI (Tutup kurung kurawal untuk function up)

    public function down(): void
    {
        Schema::dropIfExists('t_penjualan_detail');
    }
};