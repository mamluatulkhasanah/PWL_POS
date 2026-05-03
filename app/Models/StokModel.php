<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokModel extends Model
{
    protected $table = 't_stok'; // Tambahkan baris ini
    protected $primaryKey = 'stok_id'; // Tambahkan juga PK-nya sesuai jobsheet
    // ...;
}
