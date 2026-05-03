<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class m_barang extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
    ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'BRG01', 'barang_nama' => 'Barang A', 'harga_beli' => 1000, 'harga_jual' => 2000],
    ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'BRG02', 'barang_nama' => 'Barang B', 'harga_beli' => 1000, 'harga_jual' => 2000],
    ['barang_id' => 3, 'kategori_id' => 1, 'barang_kode' => 'BRG03', 'barang_nama' => 'Barang C', 'harga_beli' => 1000, 'harga_jual' => 2000],
    ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'BRG04', 'barang_nama' => 'Barang D', 'harga_beli' => 2000, 'harga_jual' => 3000],
    ['barang_id' => 5, 'kategori_id' => 2, 'barang_kode' => 'BRG05', 'barang_nama' => 'Barang E', 'harga_beli' => 2000, 'harga_jual' => 3000],
    ['barang_id' => 6, 'kategori_id' => 2, 'barang_kode' => 'BRG06', 'barang_nama' => 'Barang F', 'harga_beli' => 2000, 'harga_jual' => 3000],
    ['barang_id' => 7, 'kategori_id' => 3, 'barang_kode' => 'BRG07', 'barang_nama' => 'Barang G', 'harga_beli' => 3000, 'harga_jual' => 4000],
    ['barang_id' => 8, 'kategori_id' => 3, 'barang_kode' => 'BRG08', 'barang_nama' => 'Barang H', 'harga_beli' => 3000, 'harga_jual' => 4000],
    ['barang_id' => 9, 'kategori_id' => 3, 'barang_kode' => 'BRG09', 'barang_nama' => 'Barang I', 'harga_beli' => 3000, 'harga_jual' => 4000],
    ['barang_id' => 10, 'kategori_id' => 4, 'barang_kode' => 'BRG10', 'barang_nama' => 'Barang J', 'harga_beli' => 4000, 'harga_jual' => 5000],
    ['barang_id' => 11, 'kategori_id' => 4, 'barang_kode' => 'BRG11', 'barang_nama' => 'Barang K', 'harga_beli' => 4000, 'harga_jual' => 5000],
    ['barang_id' => 12, 'kategori_id' => 4, 'barang_kode' => 'BRG12', 'barang_nama' => 'Barang L', 'harga_beli' => 4000, 'harga_jual' => 5000],
    ['barang_id' => 13, 'kategori_id' => 5, 'barang_kode' => 'BRG13', 'barang_nama' => 'Barang M', 'harga_beli' => 5000, 'harga_jual' => 6000],
    ['barang_id' => 14, 'kategori_id' => 5, 'barang_kode' => 'BRG14', 'barang_nama' => 'Barang N', 'harga_beli' => 5000, 'harga_jual' => 6000],
    ['barang_id' => 15, 'kategori_id' => 3, 'barang_kode' => 'BRG15', 'barang_nama' => 'Barang O', 'harga_beli' => 5000, 'harga_jual' => 7000],

];

DB::table('m_barang')->insert($data);
    }
}