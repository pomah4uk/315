<?php

namespace Database\Factories;

use App\Models\CoursesModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoursesModelFactory extends Factory
{
    protected $model = CoursesModel::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'duration' => $this->faker->numberBetween(1, 12) . ' месяцев',
            'price' => $this->faker->numberBetween(1000, 10000),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
} 