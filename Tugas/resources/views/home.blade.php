@extends('header.header')
@section('content')
    <div class="container-fluid mt-3">
        <form class="row g-3" action="" method="GET">
            @csrf
            <div class="col-md-4">
                <label for="kategori" class="form-label">kategori Buku</label>
                <select name="id_kategori" class="form-select" id="id_kategori">
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategori as $kat)
                        <option value="{{ $kat->id_kategori }}" @if (isset($_GET['id_kategori']))
                            {{ $_GET['id_kategori'] == $kat->id_kategori ? 'selected' : '' }}
                        @endif >
                            {{ $kat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="nama_anggota" class="form-label">Nama Anggota</label>
                <select name="id_anggota" class="form-select" id="id_anggota">
                    <option value="">Pilih Anggota</option>
                    @foreach ($anggota as $agt)
                        <option value="{{ $agt->id_anggota }}" @if (isset($_GET['id_anggota']))
                            {{ $_GET['id_anggota'] == $agt->id_anggota ? 'selected' : '' }}
                        @endif >
                            {{ $agt->nama_anggota }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="nama_anggota" class="form-label"></label>
                <button type="submit" class="form-control btn btn-primary mt-2">Cari</button>
            </div>
        </form>
    </div>

    <div class="container-fluid mt-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Kategori Buku</th>
                    <th scope="col">Peminjam Buku</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$item->judul_buku}}</td>
                        <td>@foreach ($item->kategori as $items)
                            @php
                                $kategori = '';
                            @endphp

                            @php
                                echo $kategori .= '<span class="badge bg-primary">'.$items->nama_kategori->nama_kategori.'</span>';
                            @endphp
                        @endforeach
                    </td>
                        <td>{{$item->peminjam->nama_anggota ?? ''}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
