<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cabang')->insert([
            [
                'nama_cabang' => 'Minimarket 1',
                'lokasi_cabang' => 'Cianjur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_cabang' => 'Minimarket 2',
                'lokasi_cabang' => 'Cianjur Selatan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_cabang' => 'Minimarket 3',
                'lokasi_cabang' => 'Sukabumi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_cabang' => 'Minimarket 4',
                'lokasi_cabang' => 'Cipanas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_cabang' => 'Minimarket 5',
                'lokasi_cabang' => 'Cikalong',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
