<?php

namespace Database\Factories;

use App\Models\ShortUrl;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShortUrl>
 */
class ShortUrlFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'original_url' => $this->faker->url(),
            'slug' => $this->faker->slug(),
        ];
    }

    /**
     * Configure the model factory.
     */
    public function configure(): static
    {
        return $this->afterMaking(function (ShortUrl $shortUrl) {
            // make string of the slug that will always the same for the same original_url
            $shortUrl->slug = substr(md5($shortUrl->original_url), 0, 8);
        })->afterCreating(function (ShortUrl $shortUrl) {
            // ...
        });
    }
}
