<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('branches')->insert([
            [
                'id' => 1,
                'nama_cabang' => 'Jakarta Mart',
                'lokasi_cabang' => 'Jakarta',
            ],
            [
                'id' => 2,
                'nama_cabang' => 'Bogor Mart',
                'lokasi_cabang' => 'Bogor',
            ],
            [
                'id' => 3,
                'nama_cabang' => 'Depok Mart',
                'lokasi_cabang' => 'Depok',
            ],
            [
                'id' => 4,
                'nama_cabang' => 'Tangerang Mart',
                'lokasi_cabang' => 'Tangerang',
            ],
            [
                'id' => 5,
                'nama_cabang' => 'Bekasi Mart',
                'lokasi_cabang' => 'Bekasi',
            ],
        ]);
    }
}
