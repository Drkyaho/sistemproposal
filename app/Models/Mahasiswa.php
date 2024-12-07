<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

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

    public function kta()
    {
        return $this->belongsTo(KTA::class, 'kta_id');
    }
}
