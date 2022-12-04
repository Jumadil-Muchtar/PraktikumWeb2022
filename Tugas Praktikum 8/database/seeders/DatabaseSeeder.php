<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'admin',
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
        ]);
        
        User::create([
            'nama' => 'mahasiswa',
            'email' => 'mahasiswa@gmail.com',
            'username' => 'mahasiswa',
            'password' => bcrypt('mahasiswa123'),
            'role' => 'mahasiswa',
        ]);
        
        Mahasiswa::factory()
            ->count(1000)
            ->create();

    }
}
