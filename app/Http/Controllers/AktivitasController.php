<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AktivitasController extends Controller

{
    function index(){
        $data = Aktivitas::latest()->get();
        return view('aktivitas.index', compact('data'));
    }

    public function create()
    {
        return view('aktivitas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_aktivitas' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required|date',
        ]);

        Aktivitas::create($request->all());

        return redirect()->route('aktivitas')->with('success', 'Aktivitas berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        return view('aktivitas.edit', compact('aktivitas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_aktivitas' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'nullable|boolean',
        ]);

        $aktivitas = Aktivitas::findOrFail($id);
        $aktivitas->update([
            'nama_aktivitas' => $request->nama_aktivitas,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'status' => $request->boolean('status') ?? 0,
        ]);

        return redirect()->route('aktivitas')->with('success', 'Aktivitas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        $aktivitas->delete();

        return redirect()->route('aktivitas')->with('success', 'Aktivitas berhasil dihapus.');
    }

    public function show($id)
    {
        $aktivitas = Aktivitas::findOrFail($id);
        return view('aktivitas.show', compact('aktivitas'));
    }
}
