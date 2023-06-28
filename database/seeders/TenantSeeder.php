<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seeder for Tenant
        Tenant::create([
            'nama_tenant' => 'Tenant1',
            'kategori_tenant' => 'Makanan',
            'password' => bcrypt('tenant'),
            'no_telp' => '081234567890',
        ]);

        Tenant::create([
            'nama_tenant' => 'Tenant2',
            'kategori_tenant' => 'Minuman',
            'password' => bcrypt('tenant'),
            'no_telp' => '081234567890',
        ]);

        Tenant::create([
            'nama_tenant' => 'Tenant3',
            'kategori_tenant' => 'Minuman',
            'password' => bcrypt('tenant'),
            'no_telp' => '081234567890',
        ]);
    }
}
