<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('m_kategori')->insert([
            [
                'kategori_kode' => 'ELEK001',
                'kategori_nama' => 'Elektronik',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_kode' => 'FASH002',
                'kategori_nama' => 'Fashion',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_kode' => 'ALAT003',
                'kategori_nama' => 'Alat Tulis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_kode' => 'RUMH004',
                'kategori_nama' => 'Perlengkapan Rumah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_kode' => 'MAKN005',
                'kategori_nama' => 'Makanan & Minuman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
