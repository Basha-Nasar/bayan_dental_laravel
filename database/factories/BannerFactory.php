<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Banner>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'type'=> $this->faker->firstName(),
           'title_en'=> $this->faker->firstName(),
           'title_ar'=> $this->faker->firstName(),
           'img_en'=> $this->faker->imageUrl(),
           'img_ar'=> $this->faker->imageUrl(),
           'mob_img_en'=> $this->faker->imageUrl(),
           'mob_img_ar'=> $this->faker->imageUrl(),
        ];
    }
}
