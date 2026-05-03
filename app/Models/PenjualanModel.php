<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanModel extends Model
{
   protected $table = 't_penjualan'; // Tambahkan baris ini
    protected $primaryKey = 'penjualan_id'; // Tambahkan juga PK-nya sesuai jobsheet
    // ...;
}
