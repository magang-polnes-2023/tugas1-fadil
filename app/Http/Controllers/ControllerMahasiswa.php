<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Storage;

class ControllerMahasiswa extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->paginate(5);

        return view('pages.mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required|numeric|unique:mahasiswa',
            'no_telp' => 'required|numeric',
            'umur' => 'required|numeric',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        // upload image
        $foto = $request->file('foto');
        $foto->storeAs('public/posts', $foto->hashName());


        // create post
        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'no_telp' => $request->no_telp,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto' => $foto->hashName()

        ]);

        //redirect ke index
        return redirect()->route('mahasiswa.index')->with(['success', 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('pages.mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        return view('pages.mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required|numeric|unique:mahasiswa',
            'no_telp' => 'required|numeric',
            'umur' => 'required|numeric',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto');
            $foto->storeAs('public/posts', $foto->hashName());
            
            Storage::delete('public/posts'.$mahasiswa->foto);

            $mahasiswa->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'no_telp' => $request->no_telp,
                'umur' => $request->umur,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'foto' => $foto->hashName()
            ]);


        } else {
            $mahasiswa->update([
                'nama' => $request->nama,
                'nim' => $request->nim,
                'no_telp' => $request->no_telp,
                'umur' => $request->umur,
                'alamat' => $request->alamat,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);
        }

        return redirect()->route('mahasiswa.index')->with(['success' => 'Data Berhasil di Update!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        //hapus gambar
        Storage::delete('public/posts'. $mahasiswa->foto);

        //hapus post
        $mahasiswa->delete();


        //redirect to index
        return redirect()->route('mahasiswa.index')-> with(['success' => 'Data Berhasil di Hapus!']);
    }
}