<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seeder for Kategori
        Kategori::create([
            'nama_kategori' => 'Makanan',
        ]);
        Kategori::create([
            'nama_kategori' => 'Minuman',
        ]);
        Kategori::create([
            'nama_kategori' => 'Snack',
        ]);
        Kategori::create([
            'nama_kategori' => 'Pakaian',
        ]);
        Kategori::create([
            'nama_kategori' => 'Aksesoris',
        ]);
    }
}
