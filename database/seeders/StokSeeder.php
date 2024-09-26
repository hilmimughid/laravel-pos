<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('t_stok')->insert([
            [
                'barang_id' => 1, // Laptop ASUS
                'user_id' => 1,
                'stok_tanggal' => '2024-08-01',
                'stok_jumlah' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 2, // Smartphone Samsung
                'user_id' => 1,
                'stok_tanggal' => '2024-08-02',
                'stok_jumlah' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 3, // Jaket Kulit
                'user_id' => 2,
                'stok_tanggal' => '2024-08-03',
                'stok_jumlah' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 4, // Sepatu Nike
                'user_id' => 2,
                'stok_tanggal' => '2024-08-04',
                'stok_jumlah' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 5, // Pulpen Pilot
                'user_id' => 3,
                'stok_tanggal' => '2024-08-05',
                'stok_jumlah' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 6, // Buku Tulis
                'user_id' => 3,
                'stok_tanggal' => '2024-08-06',
                'stok_jumlah' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 7, // Kompor Gas
                'user_id' => 1,
                'stok_tanggal' => '2024-08-07',
                'stok_jumlah' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 8, // Setrika Listrik
                'user_id' => 1,
                'stok_tanggal' => '2024-08-08',
                'stok_jumlah' => 40,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 9, // Susu UHT
                'user_id' => 2,
                'stok_tanggal' => '2024-08-09',
                'stok_jumlah' => 200,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'barang_id' => 10, // Snack Coklat
                'user_id' => 2,
                'stok_tanggal' => '2024-08-10',
                'stok_jumlah' => 150,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
