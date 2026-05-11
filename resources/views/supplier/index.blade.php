@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                {{-- Perbaikan: Link diarahkan ke supplier/create, bukan user/create --}}
                <a class="btn btn-sm btn-primary mt-1" href="{{ url('supplier/create') }}">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="supplier_kode">Filter Supplier:</label>
                        <select class="form-control" id="filter_supplier" name="filter_supplier">
                            <option value="">- Semua -</option>
                            @foreach($suppliers as $item)
                                <option value="{{ $item->supplier_kode }}">{{ $item->supplier_nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Filter berdasarkan nama supplier</small>
                    </div>
                </div>
            </div>
            
            {{-- Perbaikan: ID tabel harus konsisten dengan yang dipanggil di JavaScript --}}
            <table class="table table-bordered table-striped table-hover table-sm" id="table_supplier">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('js')
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            var dataSupplier = $('#table_supplier').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('supplier/list') }}",
                    dataType: "json",
                    type: "POST",
                    data: function(d) {
                        // Perbaikan: Ambil value dari ID filter yang benar
                        d.supplier_kode = $('#filter_supplier').val();
                    }
                },
                columns: [
                    { data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false },
                    { data: "supplier_kode", orderable: true, searchable: true },
                    { data: "supplier_nama", orderable: true, searchable: true },
                    { data: "supplier_alamat", orderable: false, searchable: true },
                    { data: "aksi", className: "text-center", orderable: false, searchable: false }
                ]
            });

            // Reload tabel saat filter berubah
            $('#filter_supplier').on('change', function() {
                dataSupplier.ajax.reload();
            });
        });
    </script>
@endpush