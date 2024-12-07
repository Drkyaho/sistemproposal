<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KTA extends Model
{
    use HasFactory;

    // Nama tabel jika tidak sesuai konvensi Laravel
    protected $table = 'kta';

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'catatan',
        'status',
        'dosen_pembimbing1',
        'dosen_pembimbing2',
    ];

    /**
     * Relasi ke model Mahasiswa.
     * Satu KTA bisa memiliki banyak mahasiswa terkait.
     */
    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'kta_id');
    }
}
