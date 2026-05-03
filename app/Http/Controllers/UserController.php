<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua data user beserta relasi levelnya (Eager Loading)
        $user = UserModel::with('level')->get(); 
        
        // Mengirimkan data ke view 'user' dengan variabel bernama 'data'
        return view('user', ['data' => $user]); 
    }

    public function tambah()
    {
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        // Menyimpan data user baru ke database
        UserModel::create([
            'username' => $request->username,
            'nama'     => $request->nama,
            'password' => Hash::make($request->password), // Enkripsi password
            'level_id' => $request->level_id
        ]);

        return redirect(url('/user'));
    }

    public function ubah($id)
    {
        // Mencari user berdasarkan ID untuk ditampilkan di form ubah
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request)
    {
        // Mencari data lama
        $user = UserModel::find($id);

        // Update dengan data baru dari form
        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level_id = $request->level_id;

        $user->save();

        return redirect(url('/user'));
    }

   public function hapus($id)
{
    // Cari user berdasarkan user_id, bukan id standar
    $user = UserModel::where('user_id', $id)->first();
    
    if($user){
        $user->delete();
    }

    return redirect(url('/user'));
}
}