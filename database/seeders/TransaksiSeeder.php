<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 0; $i < 100; $i++) {
            $jumlah = $faker->numberBetween(1, 5);
            $id_barang = $faker->numberBetween(1, 10);
            $barang = DB::table('barang')->find($id_barang);

            if ($barang){
                $subtotal = $jumlah * $barang->harga_jual;
                DB::table('transaksi')->insert([
                    'tanggal_transaksi' => $faker->dateTimeBetween('2023-11-01', '2023-12-31'),
                    'id_barang' => $id_barang,
                    'jumlah' => $jumlah,
                    'subtotal' => $subtotal,
                    'id_cabang' => $faker->numberBetween(1, 5),
                ]);
            }
        }
    }
}
