<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 5; $i++) {
            $idCabang = $i + 1; // ID cabang dari 1 hingga 5

            DB::table('products')->insert([
                [
                    'nama_barang' => 'Sabun',
                    'stok' => 500,
                    'harga_jual' => 2000,
                    'id_cabang' => $idCabang,
                ],
                [
                    'nama_barang' => 'Sampo',
                    'stok' => 300,
                    'harga_jual' => 3000,
                    'id_cabang' => $idCabang,
                ],
                [
                    'nama_barang' => 'Pasta Gigi',
                    'stok' => 400,
                    'harga_jual' => 4000,
                    'id_cabang' => $idCabang,
                ],
                [
                    'nama_barang' => 'Tepung',
                    'stok' => 200,
                    'harga_jual' => 3500,
                    'id_cabang' => $idCabang,
                ],
                [
                    'nama_barang' => 'Gula',
                    'stok' => 500,
                    'harga_jual' => 4500,
                    'id_cabang' => $idCabang,
                ],
            ]);
        }
      }
}
