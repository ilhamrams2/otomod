<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => mt_rand(1, 2),
            'kategori_id' => mt_rand(1, 4),
            'badge_id' => mt_rand(1, 2),
            'status_id' => mt_rand(1, 2),
            'gambar' => $this->faker->imageUrl(), // Contoh gambar secara acak
            'judul' => $this->faker->sentence,
            'artikel' => $this->faker->paragraph,
        ];
    }
}
