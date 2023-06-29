<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat record admin
        Admin::create([
            'id_admin' => 'hersa',
            'nama' => 'Admin',
            'password' => bcrypt('admin'),
            'no_telp' => '081234567890',
        ]);

        Admin::create([
            'id_admin' => 'kristha',
            'nama' => 'Admin',
            'password' => bcrypt('admin'),
            'no_telp' => '081234567890',
        ]);

        Admin::create([
            'id_admin' => 'vino',
            'nama' => 'Admin',
            'password' => bcrypt('admin'),
            'no_telp' => '081234567890',
        ]);

        Admin::create([
            'id_admin' => 'vian',
            'nama' => 'Admin',
            'password' => bcrypt('admin'),
            'no_telp' => '081234567890',
        ]);
    }
}
