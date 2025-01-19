<?php

namespace Database\Factories;

use App\Models\ClientsModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsModelFactory extends Factory
{
    protected $model = ClientsModel::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
} 