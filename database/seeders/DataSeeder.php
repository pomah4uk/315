<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClientsModel;
use App\Models\CoursesModel;
use App\Models\OrdersModel;
use App\Models\PromotionModel;
use App\Models\SlugsModel;
use App\Models\CompanyModel;

class DataSeeder extends Seeder
{
    public function run(): void
    {
        // Создаем клиентов
        ClientsModel::factory(10)->create();

        // Создаем курсы
        CoursesModel::factory(10)->create();

        // Создаем акции
        PromotionModel::factory(10)->create();

        // Создаем слаги
        SlugsModel::factory(10)->create();

        CompanyModel::create([
            'id'=>'1',
            'name'=>'315 Studio',
            'address'=>'пр.Фрунзе 444 офис 100',
            'description'=>'Швейная студия',
            'phone'=>'89039049394',
            'social_media'=>'vk',
            'working_hours'=>'8-17 суббота и восскресенье выходной',
            'email'=>'example@mail.com'
        ]);
    }
}
