<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $companyIds = Company::query()->pluck('id')->toArray();

        return [
            'full_address' => $this->faker->address,
            'longitude' => $this->faker->randomFloat(6, 37.3, 37.9),
            'latitude' => $this->faker->randomFloat(6, 55.5, 55.9),
            'company_id' => $this->faker->randomElement($companyIds),
        ];
    }
}
