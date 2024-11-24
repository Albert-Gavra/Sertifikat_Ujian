<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\anggota;
use App\Models\kategori;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = buku::with('kategori','kategori.nama_kategori', 'peminjam')->orderBy('id_buku', 'desc');
        if ($request->id_kategori != '') {
            $data = $data->whereHas('kategori', function($q) use($request){

                $q->where('id_kategori', '=', $request->id_kategori);

            });
        }
        if ($request->id_anggota != '') {
            $data = $data->where('id_anggota', $request->id_anggota);
        }
        $data = $data->get();
        $kategori = kategori::all();
        $anggota = anggota::all();
        return view('home', compact('kategori', 'data', 'anggota'));
    }
}
