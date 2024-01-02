<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barang')->insert([
            [
                'nama_barang' => 'Sabun',
                'stok' => 20,
                'harga_jual' => 2000,
            ],
            [
                'nama_barang' => 'Sampo',
                'stok' => 20,
                'harga_jual' => 3000,
            ],
            [
                'nama_barang' => 'Pasta Gigi',
                'stok' => 20,
                'harga_jual' => 4000,
            ],
            [
                'nama_barang' => 'Tepung',
                'stok' => 20,
                'harga_jual' => 3500, 
            ],
            [
                'nama_barang' => 'Gula',
                'stok' => 20,
                'harga_jual' => 4500,],
        ]);
      }
}
