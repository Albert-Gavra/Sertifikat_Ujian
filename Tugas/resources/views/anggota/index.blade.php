@extends('header.header')
@section('content')
    <div class="container-fluid mt-3">
        <a href="{{route('anggota.create')}}" class="btn btn-primary m-3">Tambah Anggota</a>
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
          </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">Jumlah Buku Dipinjam</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$item->nama_anggota}}</td>
                        <td>{{count($item->buku)}} Buku</td>
                        <td>
                            <a href="{{route('anggota.show', $item->id_anggota)}}" class="btn btn-primary">Show</a>
                            <a href="{{route('anggota.edit', $item->id_anggota)}}" class="btn btn-warning">Edit</a>
                            <form action="{{route('anggota.destroy', $item->id_anggota)}}" method="post">
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
