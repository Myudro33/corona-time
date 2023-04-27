<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fakerKa = \Faker\Factory::create('ka_GE');
        return [
            'country'=>$this->faker->country(),
            'code'=>$this->faker->countryCode(),
            'confirmed'=>$this->faker->numberBetween(0,500000),
            'recovered'=>$this->faker->numberBetween(0,500000),
            'critical'=>$this->faker->numberBetween(0,500000),
            'deaths'=>$this->faker->numberBetween(0,500000),
            'name'=>['en'=>$this->faker->country(),'ka'=>$fakerKa->realText(10)]
        ];
    }
}
