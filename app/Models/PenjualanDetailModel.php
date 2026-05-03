<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetailModel extends Model
{
    protected $table = 't_penjualan_detail'; // Tambahkan baris ini
    protected $primaryKey = 'penjualan_detail_id'; // Tambahkan juga PK-nya sesuai jobsheet
    // ...;
}
