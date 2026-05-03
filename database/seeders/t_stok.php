<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class t_stok extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 15; $i++) {
            $data[] = [
                'stok_id'      => $i,
                'barang_id'    => $i,
                'user_id'      => 1, // Diinput oleh admin
                'stok_tanggal' => now(),
                'stok_jumlah'  => rand(10, 100),
            ];
        }

        DB::table('t_stok')->insert($data);
    }
}