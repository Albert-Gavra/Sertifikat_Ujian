@extends('header.header')
@section('content')
    <div class="container-fluid mt-3">
        <a href="{{route('buku.create')}}" class="btn btn-primary m-3">Tambah Buku</a>
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
          </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Penulis Buku</th>
                    <th scope="col">tanggal terbit</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$item->judul_buku}}</td>
                        <td>{{$item->penulis_buku}}</td>
                        <td>{{$item->tanggalTerbit_buku}}</td>
                        <td>@foreach ($item->kategori as $items)
                            @php
                                $kategori = '';
                            @endphp

                            @php
                                echo $kategori .= '<span class="badge bg-primary">'.$items->nama_kategori->nama_kategori.'</span>';
                            @endphp
                        @endforeach</td>
                        <td>
                            <a href="{{route('buku.edit', $item->id_buku)}}" class="btn btn-warning">Edit</a>
                            <form action="{{route('buku.destroy', $item->id_buku)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
