@extends('layouts.template')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Kategori Barang</h3>
    </div>
    <div class="card-body">
        <form action="{{ url('/kategori') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Kode Kategori</label>
                <input type="text" class="form-control" id="kategori_kode" name="kategori_kode"
                    value="{{ old('kategori_kode') }}" required>
                @error('kategori_kode')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" id="kategori_nama" name="kategori_nama"
                    value="{{ old('kategori_nama') }}" required>
                @error('kategori_nama')
                <small class="form-text text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                <a class="btn btn-sm btn-default ml-1" href="{{ url('level')}}">Kembali</a>
            </div>
        </form>
    </div>
</div>
@endsection
@push('css')
@endpush
@push('js')
@endpush