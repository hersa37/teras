<?php

namespace Database\Factories;

use App\Models\Kategori;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
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
            'nama_tenant' => $this->faker->name,
            'kategori_tenant' => $this->faker->randomElement(Kategori::all()->pluck('nama_kategori')->toArray()),
            'password' => bcrypt('tenant'),
            'no_telp' => $this->faker->phoneNumber,
        ];
    }
}
