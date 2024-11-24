@extends('header.header')
@section('content')
    <div class="container-fluid mt-3">
        <a href="{{route('kategori.create')}}" class="btn btn-primary m-3">Tambah Kategori</a>
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{session()->get('success')}}
          </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <th scope="row">{{$key+1}}</th>
                        <td>{{$item->nama_kategori}}</td>
                        <td>
                            <a href="{{route('kategori.edit', $item->id_kategori)}}" class="btn btn-warning">Edit</a>
                            <form action="{{route('kategori.destroy', $item->id_kategori)}}" method="post">
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
