@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
                <div class="card-tools">
                    <a href="{{ url('supplier/create') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-plus"></i> Tambah
                    </a>
                </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm" id="table_supplier">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                            <th class="text-center">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(function() {
            $('#table_supplier').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url("supplier/list") }}',
                    type: 'POST'
                },
                columns: [
                    { data: 'DT_RowIndex', className: 'text-center', orderable: false, searchable: false },
                    { data: 'supplier_kode' },
                    { data: 'supplier_nama' },
                    { data: 'supplier_alamat' }
                    ,
                   { data: 'aksi', orderable: false, searchable: false, className: 'text-center' }
                ]
            });
        });
    </script>
@endpush
