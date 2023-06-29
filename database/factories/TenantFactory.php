<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/** File untuk menghasilkan data dummy pada tabel tenant
 * @extends Factory<Tenant>
 */
class TenantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // nama_tenant diisi dengan nama random
            'nama_tenant' => $this->faker->name,
            // kategori_tenant diisi dengan nama kategori random dari tabel kategori
            'kategori_tenant' => $this->faker->randomElement(Kategori::all()->pluck('nama_kategori')->toArray()),
            // password diisi dengan 'tenant'
            'password' => bcrypt('tenant'),
            // no_telp diisi dengan nomor telepon random
            'no_telp' => $this->faker->phoneNumber,
        ];
    }
}
