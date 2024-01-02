<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 100; $i++) {
            $jumlah = $faker->numberBetween(1, 5);
            $nama_barang = $faker->randomElement(['Sabun', 'Sampo', 'Pasta Gigi', 'Tepung', 'Gula']);
            $id_cabang = $faker->numberBetween(1, 5);
            $barang = DB::table('products')
                ->where(['nama_barang' => $nama_barang, 'id_cabang' => $id_cabang])
                ->first();

            if ($barang){
                $subtotal = $jumlah * $barang->harga_jual;
                DB::table('transactions')->insert([
                    'tanggal_transaksi' => $faker->dateTimeBetween('2023-11-01', '2023-12-31'),
                    'id_barang' => $barang->id,
                    'jumlah' => $jumlah,
                    'subtotal' => $subtotal,
                    'id_cabang' => $id_cabang,
                ]);

                DB::table('products')
                    ->where(['id' => $barang->id, 'id_cabang' => $id_cabang])
                    ->decrement('stok', $jumlah);
            }
        }
    }
}
