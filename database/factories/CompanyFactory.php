<?php

namespace Database\Factories;

use App\Models\Industry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Industry>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $industries = Industry::query()->pluck('id')->toArray();

        return [
            'title' => $this->faker->company,
            'description' => $this->faker->paragraph,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'website' => $this->faker->url,
            'logo' => $this->faker->imageUrl(200, 200, 'business'),
            'images' => json_encode([
                $this->faker->imageUrl(640, 480, 'business'),
                $this->faker->imageUrl(640, 480, 'business'),
            ]),
            'industry_id' => $this->faker->randomElement($industries),
        ];
    }
}
