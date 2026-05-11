<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        // // DB::insert('insert into m_level(level_kode, level_nama, created_at) values(?, ?, ?)', ['CUS', 'Pelanggan', now()]);
        // // return 'Insert data baru berhasil';

        // // $row = DB::update('update m_level set level_nama = ? where level_kode = ?', ['Customer', 'CUS']);
        // // return 'Update data berhasil. Jumlah data yang diupdate: ' . $row . ' baris';

        // // $row = DB::delete('delete from m_level where level_kode = ?', ['CUS']);
        // // return 'Delete data berhasil. Jumlah data yang dihapus: ' . $row . ' baris';

        $breadcrumb = (object) [
            'title' => 'Level User',
            'list' => ['Home', 'Level User']
        ];
        $page = (object) [
            'title' => 'Daftar level user'
        ];
        $activeMenu = 'level';
        return view('level', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu
        ]);
    }

    public function list(Request $request)
    {
        $draw = intval($request->input('draw', 1));
        $start = intval($request->input('start', 0));
        $length = intval($request->input('length', 10));
        $search = $request->input('search.value');

        $query = DB::table('m_level');
        $recordsTotal = $query->count();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('level_kode', 'like', "%{$search}%")
                    ->orWhere('level_nama', 'like', "%{$search}%");
            });
        }

        $recordsFiltered = $query->count();
        $levels = $query->orderBy('level_id', 'asc')->skip($start)->take($length)->get();
        $data = [];
        foreach ($levels as $index => $level) {
            $data[] = [
                'DT_RowIndex' => $start + $index + 1,
                'level_id' => $level->level_id,
                'level_kode' => $level->level_kode,
                'level_nama' => $level->level_nama,
                'aksi' => '<a href="' . url("level/{$level->level_id} /show") . '" class="btn btn-xs btn-info mr-1">Detail</a>' .
                         '<a href="' . url("level/{$level->level_id}/edit") . '" class="btn btn-xs btn-warning mr-1">Edit</a>' .
                         '<form method="POST" action="' . url("level/{$level->level_id}") . '" style="display:inline-block;" onsubmit="return confirm(\'Hapus data ini?\');">' .
                         csrf_field() . method_field('DELETE') .
                         '<button type="submit" class="btn btn-xs btn-danger">Hapus</button>' .
                         '</form>',
            ];
        }

        return response()->json([
            'draw' => $draw,
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data,
        ]);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Level',
            'list' => ['Home', 'Level User', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah level user'
        ];
        $activeMenu = 'level';

        return view('level.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_kode' => 'required|string|unique:m_level,level_kode',
            'level_nama' => 'required|string|max:100'
        ]);

        DB::table('m_level')->insert([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/level')->with('success', 'Level user berhasil ditambahkan');
    }

    public function show($id)
    {
        $level = LevelModel::findorFail($id);
        $breadcrumb = (object) [
            'title' => 'Detail Level',
            'list' => ['Home', 'Level User', 'Detail']
        ];
        $page = (object) [
            'title' => 'Detail level user'
        ];
        $activeMenu = 'level';

        return view('level.show' ,['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'level' => $level]);
    }

    public function edit($id)
    {
        $level = DB::table('m_level')->where('level_id', $id)->first();
        $breadcrumb = (object) [
            'title' => 'Edit Level',
            'list' => ['Home', 'Level User', 'Edit']
        ];
        $page = (object) [
            'title' => 'Edit level user'
        ];
        $activeMenu = 'level';

        return view('level.edit', compact('breadcrumb', 'page', 'activeMenu', 'level'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'level_kode' => 'required|string|unique:m_level,level_kode,' . $id . ',level_id',
            'level_nama' => 'required|string|max:100'
        ]);

        DB::table('m_level')->where('level_id', $id)->update([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
            'updated_at' => now(),
        ]);

        return redirect('/level')->with('success', 'Level user berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::table('m_level')->where('level_id', $id)->delete();
        return redirect('/level')->with('success', 'Level user berhasil dihapus');
    }
}