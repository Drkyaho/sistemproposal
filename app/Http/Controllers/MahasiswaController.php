<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = \App\Models\Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'npm' => 'required',
            'judul' => 'required',
            'file' => 'required|file',
            'dospem_1' => 'required',  // Validasi untuk dospem_1
            'dospem_2' => 'required',  // Validasi untuk dospem_2
            'catatan_dospem' => 'nullable',  // Validasi untuk catatan_dospem
        ]);

        // Menyimpan file yang di-upload
        $filePath = $request->file('file')->store('proposals');

        // Menyimpan data mahasiswa termasuk dospem_1, dospem_2, dan catatan_dospem
        \App\Models\Mahasiswa::create([
            'nama' => $validated['nama'],
            'npm' => $validated['npm'],
            'judul' => $validated['judul'],
            'file_path' => $filePath,
            'dospem_1' => $validated['dospem_1'],  // Menyimpan dospem_1
            'dospem_2' => $validated['dospem_2'],  // Menyimpan dospem_2
            'catatan_dospem' => $validated['catatan_dospem'] ?? null,  // Menyimpan catatan_dospem, jika ada
        ]);

        return redirect('/mahasiswa');
    }
}
