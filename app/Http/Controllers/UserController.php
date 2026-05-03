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
    $user = UserModel::findOr(1, ['username', 'nama'], function () {
        abort(404);
    });

    return view('user', ['data' => $user]);
}
}