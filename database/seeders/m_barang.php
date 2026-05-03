<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Supplier 1
            [
                'barang_id'     => 1,
                'kategori_id'   => 1,
                'barang_kode'   => 'B001',
                'barang_nama'   => 'Snack Taro',
                'harga_beli'    => 5000,
                'harga_jual'    => 7000,
            ],
            [
                'barang_id'     => 2,
                'kategori_id'   => 1,
                'barang_kode'   => 'B002',
                'barang_nama'   => 'Roti Awan',
                'harga_beli'    => 8000,
                'harga_jual'    => 10000,
            ],
            // ... tambahkan data lainnya sampai 15 barang
        ];

        DB::table('m_barang')->insert($data);
    }
}