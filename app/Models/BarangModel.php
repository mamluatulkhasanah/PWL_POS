<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
   protected $table = 'm_barang'; // Tambahkan baris ini
    protected $primaryKey = 'barang_id'; // Tambahkan juga PK-nya sesuai jobsheet
    // ...;
}
