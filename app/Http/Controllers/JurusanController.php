<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class JurusanController extends Controller
{
    public function index()
{
    $mahasiswa = \App\Models\Mahasiswa::whereNotNull('status')->get();
    return view('jurusan.index', compact('mahasiswa'));
}

}
