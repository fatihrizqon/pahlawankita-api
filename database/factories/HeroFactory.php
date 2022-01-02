<?php

namespace Database\Factories;

use App\Models\Hero;
use Illuminate\Database\Eloquent\Factories\Factory;

class HeroFactory extends Factory
{
    protected $model = Hero::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->name(),
            'origin' => $this->faker->city(),
            'date_of_birth' => $this->faker->datetime('d/m/Y'),
            'date_of_death' => $this->faker->datetime('d/m/Y'),
            'description' => $this->faker->paragraph(2)
    	];
    }
}
