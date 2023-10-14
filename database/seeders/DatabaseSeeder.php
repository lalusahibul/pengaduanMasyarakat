<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // User::create([
        //     'name' => 'lalu sahibul',
        //     'level' => 'admin',
        //     'username' => '190602040',
        //     'password' => bcrypt('111'),
        //     'remember_token' => Str::random(60)
        // ]);
        Petugas::create([
            'id_petugas' => '1',
            'nama_petugas' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'telp' => '081234567',
            'level' => 'admin',
        ]);
        // Petugas::create([

        //     'id_petugas' => '2',
        //     'nama_petugas' => 'Antoni Saputra',
        //     'username' => 'toni',
        //     'password' => bcrypt('111'),
        //     'telp' => '081234567890',
        //     'level' => 'petugas',
        // ]);
        // Masyarakat::create([

        //     'nik' => '0824782',
        //     'nama' => 'Umar Bakri',
        //     'username' => 'umar',
        //     'password' => bcrypt('111'),
        //     'telp' => '87420850717',
        // ]);
        // Masyarakat::create([

        //     'nik' => '249869',
        //     'nama' => 'Dodi Irwanto',
        //     'username' => 'dodi',
        //     'password' => bcrypt('111'),
        //     'telp' => '91470937',
        // ]);
        // Masyarakat::create([

        //     'nik' => '2740930985',
        //     'nama' => 'Sopian Hadi',
        //     'username' => 'sopian',
        //     'password' => bcrypt('111'),
        //     'telp' => '23974296',
        // ]);
    }
}
