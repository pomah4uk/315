<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Roman',
            'email' => 'pomah4uk@gmail.com',
            'password' => bcrypt(env('ADMIN_PASSWORD')), // Получаем пароль из переменной окружения
        ]);
    }
} 