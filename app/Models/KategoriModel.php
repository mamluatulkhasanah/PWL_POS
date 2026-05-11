<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    protected $table = 'm_kategori'; // Tambahkan baris ini
    protected $primaryKey = 'kategori_id'; // Tambahkan juga PK-nya sesuai jobsheet
    // ...;
}
