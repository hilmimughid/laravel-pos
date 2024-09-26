<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('t_penjualan')->insert([
            [
                'user_id' => 1,
                'pembeli' => 'John Doe',
                'penjualan_kode' => 'PNJ001',
                'penjualan_tgl' => '2024-08-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'pembeli' => 'Jane Smith',
                'penjualan_kode' => 'PNJ002',
                'penjualan_tgl' => '2024-08-02',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'pembeli' => 'Michael Johnson',
                'penjualan_kode' => 'PNJ003',
                'penjualan_tgl' => '2024-08-03',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'pembeli' => 'Emily Davis',
                'penjualan_kode' => 'PNJ004',
                'penjualan_tgl' => '2024-08-04',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Chris Brown',
                'penjualan_kode' => 'PNJ005',
                'penjualan_tgl' => '2024-08-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Sarah Wilson',
                'penjualan_kode' => 'PNJ006',
                'penjualan_tgl' => '2024-08-06',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'pembeli' => 'David Lee',
                'penjualan_kode' => 'PNJ007',
                'penjualan_tgl' => '2024-08-07',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'pembeli' => 'Jessica Taylor',
                'penjualan_kode' => 'PNJ008',
                'penjualan_tgl' => '2024-08-08',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Daniel Moore',
                'penjualan_kode' => 'PNJ009',
                'penjualan_tgl' => '2024-08-09',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'pembeli' => 'Sophia Martinez',
                'penjualan_kode' => 'PNJ010',
                'penjualan_tgl' => '2024-08-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
