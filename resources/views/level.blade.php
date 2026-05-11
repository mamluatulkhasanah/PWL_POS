@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a href="{{ url('level/create') }}" class="btn btn-sm btn-success">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover table-sm" id="table_level">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Level</th>
                        <th>Nama Level</th>
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
            $('#table_level').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ url("level/list") }}',
                    type: 'POST'
                },
                columns: [
                    { data: 'DT_RowIndex', className: 'text-center', orderable: false, searchable: false },
                    { data: 'level_kode' },
                    { data: 'level_nama' }
                    ,
                    { data: 'aksi', orderable: false, searchable: false, className: 'text-center' }
                ]
            });
        });
    </script>
@endpush