<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Log;

class KTAController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('kta.index', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        // Debug input data
        Log::info('Request data for update:', $request->all());

        try {
            // Validasi data input
            $validated = $request->validate([
                'status' => 'required|string',
                'dosen1' => 'required|string',
                'dosen2' => 'required|string',
            ]);

            // Log data setelah validasi
            Log::info('Validated data:', $validated);

            // Mencari data mahasiswa berdasarkan ID
            $mahasiswa = Mahasiswa::findOrFail($id);

            // Log data mahasiswa yang ditemukan
            Log::info('Found Mahasiswa record:', $mahasiswa->toArray());

            // Melakukan update data mahasiswa
            $mahasiswa->update([
                'status' => $validated['status'],
                'dospem_1' => $validated['dosen1'], // Sesuaikan dengan nama kolom yang ada di database
                'dospem_2' => $validated['dosen2'], // Sesuaikan dengan nama kolom yang ada di database
                'catatan_dospem' => $request->input('catatan_dospem'), // Ambil catatan dari form
            ]);

            // Log sukses
            Log::info('Update successful for ID:', ['id' => $id]);

            // Mengembalikan respon JSON sukses
            return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui.']);
        } catch (\Exception $e) {
            // Log error detail
            Log::error('Update failed:', [
                'id' => $id,
                'error' => $e->getMessage(),
                'stack' => $e->getTraceAsString(),
            ]);

            // Mengembalikan respon JSON error dengan pesan yang lebih detail
            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data: ' . $e->getMessage(),
            ]);
        }
    }


    public function downloadPDF()
    {
        $mahasiswa = Mahasiswa::whereNotNull('status')->get();
        $pdf = Pdf::loadView('pdf.mahasiswa', compact('mahasiswa'));
        return $pdf->download('pengajuan-proposal.pdf');
    }
}
