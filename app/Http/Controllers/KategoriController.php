<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
   public function index()
   {
        $breadcrumb = (object) [
            'title' => 'Kategori Barang',
            'list' => ['Home', 'Kategori Barang']
        ];
        $page = (object) [
            'title' => 'Daftar kategori barang'
        ];
        $activeMenu = 'kategori';
        return view('kategori', [
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

        $query = DB::table('m_kategori');
        $recordsTotal = $query->count();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('kategori_kode', 'like', "%{$search}%")
                    ->orWhere('kategori_nama', 'like', "%{$search}%");
            });
        }

        $recordsFiltered = $query->count();
        $categories = $query->orderBy('kategori_id', 'asc')->skip($start)->take($length)->get();
        $data = [];
        foreach ($categories as $index => $item) {
            $data[] = [
                'DT_RowIndex' => $start + $index + 1,
                'kategori_id' => $item->kategori_id,
                'kategori_kode' => $item->kategori_kode,
                'kategori_nama' => $item->kategori_nama,
                    'aksi' => '<a href="' . url("kategori/{$item->kategori_id}") . '" class="btn btn-xs btn-info mr-1">Detail</a>' .
                             '<a href="' . url("kategori/{$item->kategori_id}/edit") . '" class="btn btn-xs btn-warning mr-1">Edit</a>' .
                             '<form method="POST" action="' . url("kategori/{$item->kategori_id}") . '" style="display:inline-block;" onsubmit="return confirm(\'Hapus data ini?\');">' .
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
            'title' => 'Tambah Kategori',
            'list' => ['Home', 'Kategori', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah kategori'
        ];
        $activeMenu = 'kategori';

        return view('kategori.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_kode' => 'required|string|max:10|unique:m_kategori,kategori_kode',
            'kategori_nama' => 'required|string|max:100'
        ]);

        DB::table('m_kategori')->insert([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/kategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function show($id)
    {
        $kategori = DB::table('m_kategori')->where('kategori_id', $id)->first();
        $breadcrumb = (object) [
            'title' => 'Detail Kategori',
            'list' => ['Home', 'Kategori', 'Detail']
        ];
        $page = (object) [
            'title' => 'Detail kategori'
        ];
        $activeMenu = 'kategori';

        return view('kategori.show', compact('breadcrumb', 'page', 'activeMenu', 'kategori'));
    }

    public function edit($id)
    {
        $kategori = DB::table('m_kategori')->where('kategori_id', $id)->first();
        $breadcrumb = (object) [
            'title' => 'Edit Kategori',
            'list' => ['Home', 'Kategori', 'Edit']
        ];
        $page = (object) [
            'title' => 'Edit kategori'
        ];
        $activeMenu = 'kategori';

        return view('kategori.edit', compact('breadcrumb', 'page', 'activeMenu', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_kode' => 'required|string|max:10|unique:m_kategori,kategori_kode,' . $id . ',kategori_id',
            'kategori_nama' => 'required|string|max:100'
        ]);

        DB::table('m_kategori')->where('kategori_id', $id)->update([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
            'updated_at' => now(),
        ]);

        return redirect('/kategori')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::table('m_kategori')->where('kategori_id', $id)->delete();
        return redirect('/kategori')->with('success', 'Kategori berhasil dihapus');
    }
}