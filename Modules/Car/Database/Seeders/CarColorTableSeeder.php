<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarColorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colour = ['Хар', 'Ясан цагаан', 'Сувдан цагаан', 'Мөнгөлөг', 'asphalt-gray', 'Улаан', 'Цэнхэр', 'Хар хөх', 'Бүдэг цэнхэр', 'Бор', 'Хүрэл бор', 'Ногоон', 'Цайвар ногоон', 'Алтлаг', 'Зэсэн хүрэн', 'Элсэн шар'];

        $parent = TaxonomyManager::register('Color', 'car', null, ['metaKey' => 'colorName']);

        foreach ($colour as $key => $color) {
            TaxonomyManager::register($color, 'car-colors', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);

    }
}
