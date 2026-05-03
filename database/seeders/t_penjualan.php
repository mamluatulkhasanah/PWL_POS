<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class t_penjualan extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'penjualan_id'      => $i,
                'user_id'           => 3, // Dilakukan oleh Kasir
                'pembeli'           => 'Pelanggan ' . $i,
                'penjualan_kode'    => 'TRX00' . $i,
                'penjualan_tanggal' => now(),
            ];
        }

        DB::table('t_penjualan')->insert($data);
    }
}