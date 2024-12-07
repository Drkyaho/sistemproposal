<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class KTAController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('kta.index', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
{
    try {
        // Mencari data mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Melakukan update data mahasiswa
        $mahasiswa->update([
            'status' => $request->input('status'),
            'dosen1' => $request->input('dosen1'),
            'dosen2' => $request->input('dosen2'),
        ]);

        // Mengembalikan respon JSON sukses
        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui.']);
    } catch (\Exception $e) {
        // Mengembalikan respon JSON error
        return response()->json(['success' => false, 'message' => 'Gagal memperbarui data: ' . $e->getMessage()]);
    }
}


    public function downloadPDF()
    {
        $mahasiswa = Mahasiswa::whereNotNull('status')->get();
        $pdf = Pdf::loadView('pdf.mahasiswa', compact('mahasiswa'));
        return $pdf->download('pengajuan-proposal.pdf');
    }
}
