@extends('header.header')
@section('content')
    <div class="container-fluid mt-3">
        <form class="row g-3" action="{{ isset($kategori) == false ? route('kategori.store') : route('kategori.update', $kategori->id_kategori) }}"
            method="POST">
            @csrf
            @if (isset($kategori))
                @method('PUT')
            @endif
            <div class="col-md-12">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input class="form-control @error('nama_kategori')
                is-invalid
            @enderror"
                    type="text" name="nama_kategori" id="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}"
                    placeholder="masukkan Nama kategori">
                @error('nama_kategori')
                    <div class="text-danger" style="font-size: 12px">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-2">
                <button type="submit" class="form-control btn btn-primary mt-2">Simpan</button>
            </div>
        </form>
    </div>
@endsection
