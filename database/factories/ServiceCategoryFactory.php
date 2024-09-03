<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServiceCategory>
 */
class ServiceCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_en' => $this->faker->firstName(),
            'title_ar' => $this->faker->firstName(),
            'name_en' => $this->faker->firstName(),
            'name_ar' => $this->faker->firstName(),
        ];
    }
}
