@extends('header.header')
@section('content')
    <div class="container-fluid mt-3">
        <form class="row g-3" action="{{ isset($anggota) == false ? route('anggota.store') : route('anggota.update', $anggota->id_anggota) }}" method="POST">
            @csrf
            @if (isset($anggota))
                @method('PUT')
            @endif
            <div class="col-md-12">
                <label for="nama_anggota" class="form-label">Nama Anggota</label>
                <input class="form-control @error('nama_anggota')
                is-invalid
            @enderror"
                    type="text" name="nama_anggota" id="nama_anggota" value="{{ old('nama_anggota', $anggota->nama_anggota ?? '') }}"
                    placeholder="masukkan Nama Anggota">
                    @error('nama_anggota')
                        <div class="text-danger" style="font-size: 12px">{{$message}}</div>
                    @enderror
            </div>
            <div class="col-md-12">
                <label for="id_buku" class="form-label">Pinjam Buku</label>
                <select class="form-select" name="id_buku[]" id="id_buku" multiple>
                    <option value=""></option>
                    @php
                        $id = [];
                    @endphp
                    @foreach ($buku as $item)
                    @if (isset($anggota->buku))

                    @for ($i = 0; $i < count($anggota->buku); $i++)
                        @php
                            array_push($id, $anggota->buku[$i]->id_buku);
                        @endphp
                    @endfor
                    @endif
                    <option value="{{$item->id_buku}}" @if (in_array($item->id_buku, $id))
                        selected
                    @endif>{{$item->judul_buku}} ({{$item->penulis_buku}})</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="form-control btn btn-primary mt-2">Simpan</button>
            </div>
        </form>
    </div>
@endsection
