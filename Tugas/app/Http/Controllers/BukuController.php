<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\kategori_buku;
use App\Models\kategori;
use Illuminate\Http\Request;
use App\Http\Requests\BukuRequest;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = buku::with('kategori', 'kategori.nama_kategori')->orderBy('id_buku', 'desc')->get();
        // dd($data);
        return view('buku.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = kategori::all();
        return view('buku.form', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BukuRequest $request)
    {
        if ($request->validated()) {
            $data = $request->all();

            $buku = buku::create($data);

            $buku->save();

            for ($i=0; $i < count($request->id_kategori); $i++) {
                kategori_buku::create([
                    "id_buku" => $buku->id,
                    "id_kategori" => $request->id_kategori[$i]
                ]);
            }
            return redirect()->route('buku.index')->with('success', 'Berhasil Menyimpan Buku');
        }
        return redirect()->back()->withErrors(['errors' => $request->errors()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = kategori::all();
        $buku = buku::with('kategori', 'kategori.nama_kategori')->where('id_buku',$id)->first();
        return view('buku.form', compact('kategori','buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BukuRequest $request, string $id)
    {
        if ($request->validated()) {
            $data = $request->all();
            $buku = buku::where('id_buku', $id);
            $data = $request->except(['_token', '_method', 'id_kategori']);
            $buku->update($data);
            $buku_kategori = kategori_buku::where('id_buku', $id)->delete();
            for ($i=0; $i < count($request->id_kategori); $i++) {
                kategori_buku::create([
                    "id_buku" => $id,
                    "id_kategori" => $request->id_kategori[$i]
                ]);
            }
            return redirect()->route('buku.index')->with('success', 'Berhasil mengupdate Buku');
        }
        return redirect()->back()->withErrors(['errors' => $request->errors()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = buku::where('id_buku',$id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Berhasil Menghapus Buku');
    }
}
