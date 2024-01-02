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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_barang');
            $table->date('tanggal_transaksi');
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->unsignedBigInteger('id_cabang');

            $table->foreign('id_barang')->references('id')->on('barang');
            $table->foreign('id_cabang')->references('id')->on('cabang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
