@extends('header.header')
@section('content')
    <div class="container-fluid mt-3">
        <div class="alert alert-success" role="alert">
            Jumlah Buku Dipinjam : {{count($data->buku)}}
          </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Penulis Buku</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->buku as $key => $item)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$item->judul_buku}}</td>
                        <td>{{$item->penulis_buku}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
