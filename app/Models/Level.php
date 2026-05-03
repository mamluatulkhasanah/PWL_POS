<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'm_level'; // Tambahkan baris ini
    protected $primaryKey = 'level_id'; // Tambahkan juga PK-nya sesuai jobsheet
    // ...;
}
