@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        @if(!$level)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                Data level tidak ditemukan.
            </div>
            <a href="{{ url('level') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        @else
            <form method="POST" action="{{ url('level/'.$level->level_id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="level_kode">Kode Level</label>
                    <input type="text" class="form-control @error('level_kode') is-invalid @enderror" id="level_kode" name="level_kode" value="{{ old('level_kode', $level->level_kode) }}" required>
                    @error('level_kode')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="level_nama">Nama Level</label>
                    <input type="text" class="form-control @error('level_nama') is-invalid @enderror" id="level_nama" name="level_nama" value="{{ old('level_nama', $level->level_nama) }}" required>
                    @error('level_nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('level') }}" class="btn btn-secondary">Kembali</a>
            </form>
        @endif
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush