@extends('header.header')
@section('content')
    <div class="container-fluid mt-3">
        <form class="row g-3" action="{{ isset($buku) == false ? route('buku.store') : route('buku.update', $buku->id_buku) }}" method="POST">
            @csrf
            @if (isset($buku))
                @method('PUT')
            @endif
            <div class="col-md-12">
                <label for="judul_buku" class="form-label">Judul Buku</label>
                <input class="form-control @error('judul_buku')
                is-invalid
            @enderror"
                    type="text" name="judul_buku" id="judul_buku" value="{{ old('judul_buku', $buku->judul_buku ?? '') }}"
                    placeholder="masukkan Nama Buku">
                    @error('judul_buku')
                        <div class="text-danger" style="font-size: 12px">{{$message}}</div>
                    @enderror
            </div>
            <div class="col-md-12">
                <label for="penulis_buku" class="form-label">Penulis Buku</label>
                <input class="form-control @error('penulis_buku')
                    is-invalid
                @enderror"
                    type="text" name="penulis_buku" id="penulis_buku"
                    value="{{ old('penulis_buku', $buku->penulis_buku ?? '') }}" placeholder="masukkan Penulis Buku">
                    @error('penulis_buku')
                        <div class="text-danger" style="font-size: 12px">{{$message}}</div>
                    @enderror
            </div>
            <div class="col-md-12">
                <label for="tanggalTerbit_buku" class="form-label">Tanggal Terbit Buku</label>
                <input class="form-control @error('tanggalTerbit_buku')
                is-invalid
            @enderror"
                    type="date" name="tanggalTerbit_buku" id="tanggalTerbit_buku"
                    value="{{ old('tanggalTerbit_buku', $buku->tanggalTerbit_buku ?? '') }}">
                    @error('tanggalTerbit_buku')
                        <div class="text-danger" style="font-size: 12px">{{$message}}</div>
                    @enderror
            </div>
            <div class="col-md-12">
                <label for="id_kategori" class="form-label">Kategori Buku</label>
                <select class="form-select" name="id_kategori[]" id="id_kategori" multiple>
                    @php
                        $id = [];
                    @endphp
                    @foreach ($kategori as $item)
                    @if (isset($buku))

                    @for ($i = 0; $i < count($buku->kategori); $i++)
                        @php
                            array_push($id, $buku->kategori[$i]->id_kategori);
                        @endphp
                    @endfor
                    @endif
                    <option value="{{$item->id_kategori}}" @if (in_array($item->id_kategori, $id))
                        selected
                    @endif>{{$item->nama_kategori}}</option>
                    @endforeach
                </select>
                    @error('id_kategori')
                        <div class="text-danger" style="font-size: 12px">{{$message}}</div>
                    @enderror
            </div>
            <div class="col-md-2">
                <button type="submit" class="form-control btn btn-primary mt-2">Simpan</button>
            </div>
        </form>
    </div>
@endsection
