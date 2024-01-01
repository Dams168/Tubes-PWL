<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DetailTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('detail_transaksi')->insert([
            'id_transaksi' => 1,
            'id_barang' => 1,
            'jumlah' => 2,
            'subtotal' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
