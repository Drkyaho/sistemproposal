<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Nama tabel jika tidak sesuai konvensi Laravel
    protected $table = 'mahasiswa';

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama',
        'npm',
        'judul',
        'file_path',
        'status',
        'kta_id',
        'dospem_1', 
        'dospem_2', 
        'catatan_dospem'
    ];

    /**
     * Relasi ke model KTA.
     * Mahasiswa hanya bisa memiliki satu KTA terkait.
     */
    public function kta()
    {
        return $this->belongsTo(KTA::class, 'kta_id');
    }
}
