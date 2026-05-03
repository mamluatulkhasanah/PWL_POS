<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
   protected $table = 'm_supplier'; // Tambahkan baris ini
    protected $primaryKey = 'supplier_id'; // Tambahkan juga PK-nya sesuai jobsheet
    // ...;
}
