<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LegalEntity>
 */
class LegalEntityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'entity_type' => $this->faker->randomElement(['LLC', 'JSC', 'Sole proprietorship', 'Non-profit organization']),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'bank_details' => $this->faker->company,
            'iban' => $this->faker->iban('UA'),
        ];
    }
}
