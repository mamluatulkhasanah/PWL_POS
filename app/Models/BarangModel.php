<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use Yajra\DataTables\Facades\DataTables;

class BarangModel extends Model
{
protected $table = 'm_barang';
protected $primaryKey = 'barang_id';
protected $fillable = ['kategori_id', 'barang_kode', 'barang_nama', 'harga_beli', 'harga_jual'];

public function kategori()
{
    // Alur relasi ke tabel m_kategori
    return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
} 
}