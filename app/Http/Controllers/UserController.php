<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function index()
{
    // Cari user dengan ID 1, ambil kolom username & nama saja.
    // Jika tidak ada, jalankan fungsi abort(404).
    $user = UserModel::firstOrCreate(
      ['username' => 'manager33'], // Cari berdasarkan username saja
        [
            'nama' => 'Manager Tiga Tiga',
            'password' => Hash::make('12345'),
            'level_id' => 2
        ]
    );

    return view('user', ['data' => $user]);
}
}