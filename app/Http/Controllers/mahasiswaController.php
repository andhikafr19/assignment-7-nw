<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = mahasiswa::orderBy('nim', 'desc')->paginate(2);
        return view('mahasiswa.index')->with('datam', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        # Validasi
        $request->validate([
            'nim' => 'required|min:4|numeric|unique:mahasiswa,nim',
            'nama' => 'required|min:4',
            'jurusan' => 'required|min:4'
        ],[
            'nim.required' => 'NIM harus di isi',
            'nama.required' => 'Nama harus di isi',
            'jurusan.required' => 'Jurusan harus di isi'
        ]);
        # Simpan data ke database
        $data = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan
        ];

        mahasiswa::create($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil menambahkan data');
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
        $data = mahasiswa::where('nim', $id)->first();
        return view('mahasiswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        # Validasi
        $request->validate([
            'nama' => 'required|min:3',
            'jurusan' => 'required|min:3'
        ],[
            'nama.required' => 'Nama harus di isi',
            'jurusan.required' => 'Jurusan harus di isi'
        ]);
        # Simpan data ke database
        $data = [
            'nama' => $request->nama,
            'jurusan' => $request->jurusan
        ];

        mahasiswa::where('nim', $id)->update($data);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        mahasiswa::where('nim', $id)->delete();
        return redirect()->to('mahasiswa')->with('success', 'Berhasil Delete Data');
    }
}
