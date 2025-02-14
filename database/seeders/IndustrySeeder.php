<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industries = [
            ['title' => 'Торговля', 'description' => 'Отрасль, связанная с куплей и продажей товаров и услуг.'],
            ['title' => 'Технологии', 'description' => 'Отрасль, включающая разработку и внедрение технологических решений.'],
            ['title' => 'Здравоохранение', 'description' => 'Отрасль, предоставляющая медицинские услуги и продукты.'],
            ['title' => 'Образование', 'description' => 'Отрасль, занимающаяся обучением и развитием навыков.'],
            ['title' => 'Финансы', 'description' => 'Отрасль, включающая управление денежными ресурсами и инвестициями.'],
            ['title' => 'Производство', 'description' => 'Отрасль, занимающаяся производством товаров и продукции.'],
            ['title' => 'Транспорт', 'description' => 'Отрасль, связанная с перевозкой людей и грузов.'],
            ['title' => 'Строительство', 'description' => 'Отрасль, занимающаяся возведением зданий и инфраструктуры.'],
        ];

        foreach ($industries as $industryData) {
            Industry::query()->create($industryData);
        }
    }
}
