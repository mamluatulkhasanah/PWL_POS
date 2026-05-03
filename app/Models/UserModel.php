<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
   protected $table = 'm_user'; // Tambahkan baris ini
    protected $primaryKey = 'user_id'; // Tambahkan juga PK-nya sesuai jobsheet
    // ...;
}
