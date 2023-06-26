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
        Admin::create([
            'id_admin' => 'admin',
            'password' => bcrypt('admin'),
            'nama' => 'Admin',
            'no_telp' => '081234567890'
        ]);
    }
}
