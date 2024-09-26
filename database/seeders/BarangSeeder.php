<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('m_barang')->insert([
            [
                'kategori_id' => 1, // Elektronik
                'barang_kode' => 'BRG001',
                'barang_nama' => 'Laptop ASUS',
                'harga_beli' => 7000000,
                'harga_jual' => 7500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 1, // Elektronik
                'barang_kode' => 'BRG002',
                'barang_nama' => 'Smartphone Samsung',
                'harga_beli' => 5000000,
                'harga_jual' => 5500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2, // Fashion
                'barang_kode' => 'BRG003',
                'barang_nama' => 'Jaket Kulit',
                'harga_beli' => 250000,
                'harga_jual' => 300000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 2, // Fashion
                'barang_kode' => 'BRG004',
                'barang_nama' => 'Sepatu Nike',
                'harga_beli' => 800000,
                'harga_jual' => 900000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3, // Alat Tulis
                'barang_kode' => 'BRG005',
                'barang_nama' => 'Pulpen Pilot',
                'harga_beli' => 3000,
                'harga_jual' => 5000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 3, // Alat Tulis
                'barang_kode' => 'BRG006',
                'barang_nama' => 'Buku Tulis',
                'harga_beli' => 5000,
                'harga_jual' => 7000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 4, // Perlengkapan Rumah
                'barang_kode' => 'BRG007',
                'barang_nama' => 'Kompor Gas',
                'harga_beli' => 250000,
                'harga_jual' => 300000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 4, // Perlengkapan Rumah
                'barang_kode' => 'BRG008',
                'barang_nama' => 'Setrika Listrik',
                'harga_beli' => 150000,
                'harga_jual' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 5, // Makanan & Minuman
                'barang_kode' => 'BRG009',
                'barang_nama' => 'Susu UHT',
                'harga_beli' => 5000,
                'harga_jual' => 7000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kategori_id' => 5, // Makanan & Minuman
                'barang_kode' => 'BRG010',
                'barang_nama' => 'Snack Coklat',
                'harga_beli' => 2000,
                'harga_jual' => 3000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
