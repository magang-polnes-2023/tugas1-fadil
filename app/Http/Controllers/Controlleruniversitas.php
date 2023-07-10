<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Universitas;

class Controlleruniversitas extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $universitas = Universitas::latest()->paginate(5);

        return view('pages.universitas.index', compact('universitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.universitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email',
            'akreditasi' => 'required',
        ]);

        Universitas::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'akreditasi' => $request->akreditasi,
        ]);

        //redirect ke index
        return redirect()->route('universitas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $universitas = Universitas::findOrFail($id);

        return view('pages.universitas.show', compact('universitas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $universitas = Universitas::findOrFail($id);

        return view('pages.universitas.edit', compact('universitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required|email',
            'akreditasi' => 'required',
        ]);

        $universitas = Universitas::findOrFail($id);

        $universitas->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'akreditasi' => $request->akreditasi,
        ]);

        //redirect ke index
        return redirect()->route('universitas.index')->with(['success' => 'Data Berhasil Diupdate!']);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $universitas = Universitas::findOrFail($id);

        $universitas->delete();

        return redirect()->route('universitas.index')-> with(['success' => 'Data Berhasil di Hapus!']);
    }
}
