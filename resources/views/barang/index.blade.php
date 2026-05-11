@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>  
        <div class="card-tools">
            {{-- Tombol tambah biasa --}}
            <a href="{{ url('barang/create') }}" class="btn btn-primary btn-sm">Tambah Barang</a>
            {{-- Tambahkan tombol Ajax jika Anda ingin menerapkan fitur modal nantinya --}}
            <button onclick="modalAction('{{ url('barang/create_ajax') }}')" class="btn btn-success btn-sm">Tambah Ajax</button>
        </div>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Filter:</label>
                    <div class="col-3">
                        <select class="form-control" id="kategori_id" name="kategori_id" required>
                            <option value="">- Semua -</option>
                            @foreach($categories as $item)
                                <option value="{{ $item->kategori_id }}">{{ $item->kategori_nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Kategori Barang</small>
                    </div>
                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

{{-- Tempat Modal --}}
<div id="myModal" class="modal fade animate bounceIn" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="static" data-keyboard="false"></div>
@endsection

@push('css')
@endpush

@push('js')
<script>
    // Fungsi modalAction diletakkan di luar document.ready agar bisa diakses global
    function modalAction(url = ''){
        $('#myModal').load(url, function() {
            $('#myModal').modal('show');
        });
    }

    var dataBarang;
    $(document).ready(function() {
        dataBarang = $('#table_barang').DataTable({
            processing: true,
            serverSide: true, 
            ajax: {
                "url": "{{ url('barang/list') }}",
                "dataType": "json",
                "type": "POST",
                "data": function (d) {
                    d.kategori_id = $('#kategori_id').val();
                }
            },
            columns: [
                {
                    data: "DT_RowIndex", // Menggunakan Index Otomatis dari Yajra
                    className: "text-center",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "barang_kode",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    data: "barang_nama",
                    className: "",
                    orderable: true,
                    searchable: true
                },
                {
                    // PERBAIKAN: Jika di controller menggunakan with('kategori'), 
                    // panggil kategori_nama melalui objek kategori
                    data: "kategori.kategori_nama", 
                    className: "",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "harga_beli",
                    className: "text-right",
                    orderable: true,
                    searchable: false,
                    render: function(data){
                        return new Intl.NumberFormat('id-ID').format(data);
                    }
                },
                {
                    data: "harga_jual",
                    className: "text-right",
                    orderable: true,
                    searchable: false,
                    render: function(data){
                        return new Intl.NumberFormat('id-ID').format(data);
                    }
                },
                {
                    data: "aksi", 
                    className: "text-center",
                    orderable: false,
                    searchable: false
                }
            ]
        });

        // Reload tabel saat filter kategori berubah
        $('#kategori_id').on('change', function() {
            dataBarang.ajax.reload();
        });
    });
</script>
@endpush