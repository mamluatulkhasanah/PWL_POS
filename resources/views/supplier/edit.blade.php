@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        @if(!$supplier)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                Data supplier tidak ditemukan.
            </div>
            <a href="{{ url('supplier') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        @else
            <form method="POST" action="{{ url('supplier/'.$supplier->supplier_id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="supplier_kode">Kode Supplier</label>
                    <input type="text" class="form-control @error('supplier_kode') is-invalid @enderror" id="supplier_kode" name="supplier_kode" value="{{ old('supplier_kode', $supplier->supplier_kode) }}" required>
                    @error('supplier_kode')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="supplier_nama">Nama Supplier</label>
                    <input type="text" class="form-control @error('supplier_nama') is-invalid @enderror" id="supplier_nama" name="supplier_nama" value="{{ old('supplier_nama', $supplier->supplier_nama) }}" required>
                    @error('supplier_nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="supplier_alamat">Alamat</label>
                    <textarea class="form-control @error('supplier_alamat') is-invalid @enderror" id="supplier_alamat" name="supplier_alamat" rows="3" required>{{ old('supplier_alamat', $supplier->supplier_alamat) }}</textarea>
                    @error('supplier_alamat')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('supplier') }}" class="btn btn-secondary">Kembali</a>
            </form>
        @endif
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush