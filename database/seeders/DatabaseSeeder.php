<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $this->call([
        LevelSeeder::class,
        UserSeeder::class,
        m_kategori::class,
        m_supplier::class,
        m_barang::class,
        t_stok::class,
        t_penjualan::class,
        t_penjualan_detail::class, 
    ]);
    }
}
