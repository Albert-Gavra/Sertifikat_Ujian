<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\anggota;
use Illuminate\Http\Request;
use App\Http\Requests\AnggotaRequest;

class anggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = anggota::with('buku')->orderBy('id_anggota', 'desc')->get();
        return view('anggota.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $buku = buku::where('id_anggota', null)->get();
        return view('anggota.form', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnggotaRequest $request)
    {
        if ($request->validated()) {
            $data = $request->all();

            $anggota = anggota::create($data);
            $anggota->save();
            if ($request->id_buku != '') {
                for ($i = 0; $i < count($request->id_buku); $i++) {
                    $buku = buku::where('id_buku', $request->id_buku[$i]);
                    $data2['id_anggota'] = $anggota->id;
                    $buku->update($data2);
                }
            }

            return redirect()->route('anggota.index')->with('success', 'Berhasil Menyimpan Anggota');
        }
        return redirect()
            ->back()
            ->withErrors(['errors' => $request->errors()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = anggota::with('buku')->where('id_anggota', $id)->first();
        return view('anggota.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buku = buku::where('id_anggota', null)->orWhere('id_anggota', $id)->get();
        $anggota = anggota::with('buku')->where('id_anggota', $id)->first();
        return view('anggota.form', compact('buku', 'anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnggotaRequest $request, string $id)
    {
        if ($request->validated()) {
            $data = $request->all();
            $anggota = anggota::where('id_anggota', $id);
            $data = $request->except(['_token', '_method', 'id_buku']);
            $anggota->update($data);

            $buku = buku::where('id_anggota', $id);
            $data2['id_anggota'] = null;
            $buku->update($data2);

            if ($request->id_buku != '') {
                for ($i = 0; $i < count($request->id_buku); $i++) {
                    $buku = buku::where('id_buku', $request->id_buku[$i]);
                    $data3['id_anggota'] = $id;
                    $buku->update($data3);
                }
            }
            return redirect()->route('anggota.index')->with('success', 'Berhasil mengupdate Anggota');
        }
        return redirect()
            ->back()
            ->withErrors(['errors' => $request->errors()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = buku::where('id_anggota', $id);
        $data2['id_anggota'] = null;
        $buku->update($data2);

        $anggota = anggota::where('id_anggota', $id);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Berhasil Menghapus Anggota');
    }
}
