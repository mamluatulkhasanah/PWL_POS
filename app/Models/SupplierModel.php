<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    // Nama tabel di database[cite: 21]
    protected $table = 'm_supplier'; 
    
    // Primary key tabel[cite: 21]
    protected $primaryKey = 'supplier_id'; 

    // Kolom yang boleh diisi (Mass Assignment)[cite: 5, 18]
    protected $fillable = ['supplier_kode', 'supplier_nama', 'supplier_alamat'];
}
