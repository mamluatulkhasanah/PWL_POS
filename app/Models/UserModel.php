<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends Model
{
    use HasFactory;

    // Mendefinisikan nama tabel yang digunakan di database
    protected $table = 'm_user'; 
    
    // Mendefinisikan primary key karena tidak menggunakan nama default 'id'
    protected $primaryKey = 'user_id'; 

    // Kolom-kolom yang diizinkan untuk pengisian massal (Mass Assignment)
    protected $fillable = ['level_id', 'username', 'nama', 'password']; 

    /**
     * Mendefinisikan relasi Many-to-One (BelongsTo) ke tabel LevelModel.
     * Fungsi ini memungkinkan pengambilan data level (seperti nama_level) melalui objek User.
     */
public function level()
{
    return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
}
}