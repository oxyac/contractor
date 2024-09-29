<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'from_entity_id' => $this->faker->numberBetween(1, 10),
            'to_entity_id' => $this->faker->numberBetween(1, 10),
            'currency' => $this->faker->currencyCode,
            'language_code' => $this->faker->languageCode,
            'contract_date' => $this->faker->date(),
            'contract_start_date' => $this->faker->date(),
            'contract_due_date' => $this->faker->date(),
            'total' => $this->faker->randomFloat(2, 100, 1000),
            'notes' => $this->faker->text,
            'is_limited' => $this->faker->boolean,
            'is_subscription' => $this->faker->boolean,
            'is_in_rates' => $this->faker->boolean,
            'company_id' => 1,
            'services' => [
                0 => [
                    'name' => $this->faker->word,
                    'price' => $this->faker->randomFloat(2, 10, 100),
                    'quantity' => $this->faker->numberBetween(1, 10),
                    ],
                1 => [
                    'name' => $this->faker->word,
                    'price' => $this->faker->randomFloat(2, 10, 100),
                    'quantity' => $this->faker->numberBetween(1, 10),
                    ],
            ],
        ];
    }
}
