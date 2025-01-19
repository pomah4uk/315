<?php

namespace Database\Factories;

use App\Models\SlugsModel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SlugsModelFactory extends Factory
{
    protected $model = SlugsModel::class;

    public function definition(): array
    {
        return [
            'slug' => Str::slug($this->faker->words(3, true)),
            'type' => $this->faker->randomElement(['course', 'promotion']),
        ];
    }
} 