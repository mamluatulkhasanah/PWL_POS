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
    $user = UserModel::findOrfail(1);

    return view('user', ['data' => $user]);
}
}