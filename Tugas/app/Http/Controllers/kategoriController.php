<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use App\Http\Requests\KategoriRequest;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = kategori::orderBy('id_kategori', 'desc')->get();
        return view('kategori.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriRequest $request)
    {
        if ($request->validated()) {
            $data = $request->all();

            $kategori = kategori::create($data);
            return redirect()->route('kategori.index')->with('success', 'Berhasil Menyimpan Kategori');
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
        $kategori = kategori::where('id_kategori', $id)->first();
        return view('kategori.form', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriRequest $request, string $id)
    {
        if ($request->validated()) {
            $data = $request->all();
            $kategori = kategori::where('id_kategori', $id);
            $data = $request->except(['_token', '_method']);
            $kategori->update($data);

            return redirect()->route('kategori.index')->with('success', 'Berhasil mengupdate Kategori');
        }
        return redirect()->back()->withErrors(['errors' => $request->errors()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = kategori::where('id_kategori',$id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Berhasil Menghapus kategori');
    }
}
