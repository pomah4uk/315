<?php

namespace Database\Factories;

use App\Models\PromotionModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromotionModelFactory extends Factory
{
    protected $model = PromotionModel::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(2, true) . ' Promotion',
            'description' => $this->faker->sentence(),
            'discount_percent' => $this->faker->numberBetween(5, 50),
            'start_date' => $this->faker->dateTimeBetween('now', '+1 week'),
            'end_date' => $this->faker->dateTimeBetween('+1 week', '+1 month'),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
} 