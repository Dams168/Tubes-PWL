<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_transaksi');
            $table->unsignedBigInteger('id_barang');
            $table->integer('jumlah');
            $table->integer('subtotal');
            $table->timestamps();

            $table->foreign('id_transaksi')->references('id')->on('transaksi');
            $table->foreign('id_barang')->references('id')->on('barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};