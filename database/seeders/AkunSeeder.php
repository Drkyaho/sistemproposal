<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kta = User::create([
            'name' => 'KTA',
            'email' => 'kta@example.com',
            'password' => bcrypt('password'),
        ]);
        $kta->assignRole('KTA');

        $adminJurusan = User::create([
            'name' => 'Admin Jurusan',
            'email' => 'adminjurusan@example.com',
            'password' => bcrypt('password'),
        ]);
        $adminJurusan->assignRole('Admin Jurusan');

        $mahasiswa = User::create([
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@example.com',
            'password' => bcrypt('password'),
        ]);
        $mahasiswa->assignRole('Mahasiswa');
    }
}
