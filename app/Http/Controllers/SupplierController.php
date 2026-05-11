<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\SupplierModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Supplier',
            'list' => ['Home', 'Supplier']
        ];
        $page = (object) [
            'title' => 'Daftar Data Supplier'
        ];
        $activeMenu = 'supplier';

$suppliers = SupplierModel::all(); // Tambahkan ini sebelum return

return view('supplier.index', [
    'breadcrumb' => $breadcrumb,
    'page' => $page,
    'activeMenu' => $activeMenu,
    'suppliers' => $suppliers // Kirim ke view agar dropdown filter tidak error
]);
    }

    public function list(Request $request)
    {
        $draw = intval($request->input('draw', 1));
        $start = intval($request->input('start', 0));
        $length = intval($request->input('length', 10));    
        $search = $request->input('search.value');

        $query = SupplierModel::query();
        $recordsTotal = $query->count();

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('supplier_kode', 'like', "%{$search}%")
                    ->orWhere('supplier_nama', 'like', "%{$search}%")
                    ->orWhere('supplier_alamat', 'like', "%{$search}%");
            });
        }

        $recordsFiltered = $query->count();
        $suppliers = $query->orderBy('supplier_id', 'asc')->skip($start)->take($length)->get();
        $data = [];
        foreach ($suppliers as $index => $supplier) {
            $data[] = [
                'DT_RowIndex' => $start + $index + 1,
                'supplier_id' => $supplier->supplier_id,
                'supplier_kode' => $supplier->supplier_kode,
                'supplier_nama' => $supplier->supplier_nama,
                'supplier_alamat' => $supplier->supplier_alamat,
                'aksi' => '<a href="' . url("supplier/{$supplier->supplier_id}") . '" class="btn btn-xs btn-info mr-1">Detail</a>' .
                         '<a href="' . url("supplier/{$supplier->supplier_id}/edit") . '" class="btn btn-xs btn-warning mr-1">Edit</a>' .
                         '<form method="POST" action="' . url("supplier/{$supplier->supplier_id}") . '" style="display:inline-block;" onsubmit="return confirm(\'Hapus data ini?\');">' .
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
            'title' => 'Tambah Supplier',
            'list' => ['Home', 'Supplier', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah supplier'
        ];
        $activeMenu = 'supplier';

        return view('supplier.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_kode' => 'required|string|max:10|unique:m_supplier,supplier_kode',
            'supplier_nama' => 'required|string|max:150',
            'supplier_alamat' => 'required|string',
        ]);

        DB::table('m_supplier')->insert([
            'supplier_kode' => $request->supplier_kode,
            'supplier_nama' => $request->supplier_nama,
            'supplier_alamat' => $request->supplier_alamat,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/supplier')->with('success', 'Supplier berhasil ditambahkan');
    }

    public function show($id)
    {
        $supplier = DB::table('m_supplier')->where('supplier_id', $id)->first();
        $breadcrumb = (object) [
            'title' => 'Detail Supplier',
            'list' => ['Home', 'Supplier', 'Detail']
        ];
        $page = (object) [
            'title' => 'Detail supplier'
        ];
        $activeMenu = 'supplier';

        return view('supplier.show', compact('breadcrumb', 'page', 'activeMenu', 'supplier'));
    }

    public function edit($id)
    {
        $supplier = DB::table('m_supplier')->where('supplier_id', $id)->first();
        $breadcrumb = (object) [
            'title' => 'Edit Supplier',
            'list' => ['Home', 'Supplier', 'Edit']
        ];
        $page = (object) [
            'title' => 'Edit supplier'
        ];
        $activeMenu = 'supplier';

        return view('supplier.edit', compact('breadcrumb', 'page', 'activeMenu', 'supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_kode' => 'required|string|max:10|unique:m_supplier,supplier_kode,' . $id . ',supplier_id',
            'supplier_nama' => 'required|string|max:150',
            'supplier_alamat' => 'required|string',
        ]);

        DB::table('m_supplier')->where('supplier_id', $id)->update([
            'supplier_kode' => $request->supplier_kode,
            'supplier_nama' => $request->supplier_nama,
            'supplier_alamat' => $request->supplier_alamat,
            'updated_at' => now(),
        ]);

        return redirect('/supplier')->with('success', 'Supplier berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::table('m_supplier')->where('supplier_id', $id)->delete();
        return redirect('/supplier')->with('success', 'Supplier berhasil dihapus');
    }
}
