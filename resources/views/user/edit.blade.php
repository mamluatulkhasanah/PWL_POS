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
            <a href="{{ url('user') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        @else
            <form method="POST" action="{{ url('user/'.$user->user_id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user->username) }}" required>
                    @error('username')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama user</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $user->nama) }}" required>
                    @error('nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="level_id">level Pengguna</label>
                    <select class="form-control @error('level_id') is-invalid @enderror" id="level_id" name="level_id" required>
                        <option value="">Pilih Level</option>
                        @foreach($level as $l)
                            <option value="{{ $l->level_id }}" {{ old('level_id', $user->level_id) == $l->level_id ? 'selected' : '' }}>{{ $l->level_nama }}</option>
                        @endforeach
                    </select>
                    @error('level_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ url('user') }}" class="btn btn-secondary">Kembali</a>
            </form>
        @endif
    </div>
</div>
@endsection

@push('css')
@endpush

@push('js')
@endpush