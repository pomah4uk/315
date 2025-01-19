<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CompanyModel;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            DataSeeder::class,
        ]);
    }
}
