<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\listing>
 */
class listingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'title' => fake()->sentence(),
            'email' => fake()->unique()->companyEmail(),
            'tags' => 'laravel, api, backend',
            'company' => fake()->company(),
            'location' => fake()->city(),
            'website' => fake()->url(),
            'description' => fake()->paragraph()
        ];
    }
}
