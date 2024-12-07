<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:20|unique:mahasiswa,npm',
            'judul' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240', // Max 10MB
        ]);

        // Menyimpan file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('uploads', 'public'); // Menyimpan file di folder public/uploads
        }

        // Membuat entri baru di database
        Mahasiswa::create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'judul' => $request->input('judul'),
            'file_path' => $filePath ?? null, // Simpan path file jika ada
        ]);

        return redirect()->back()->with('success', 'Pengajuan proposal berhasil!');
    }
}
