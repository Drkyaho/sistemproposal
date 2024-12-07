<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    // Nama tabel jika tidak sesuai konvensi Laravel
    protected $table = 'jurusan';

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama_jurusan',
    ];

    /**
     * Relasi ke model KTA.
     * Satu jurusan bisa melihat banyak data KTA.
     */
    public function kta()
    {
        return $this->hasMany(KTA::class, 'jurusan_id');
    }
}
