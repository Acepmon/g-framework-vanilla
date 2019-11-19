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
        $colour = [
            'black' => ['value' => 'Хар'], 
            'white-ivory' => ['value' => 'Ясан цагаан'], 
            'white-pearl' => ['value' => 'Сувдан цагаан'], 
            'silver' => ['value' => 'Мөнгөлөг'], 
            'asphalt-gray' => ['value' => 'Асфалтан саарал'], 
            'red' => ['value' => 'Улаан'], 
            'blue' => ['value' => 'Хөх'], 
            'blue-dark' => ['value' => 'Хар хөх'], 
            'sea' => ['value' => 'Номин ногоон'], 
            'brown' => ['value' => 'Бор'], 
            'bronze' => ['value' => 'Алтлаг бор'], 
            'green' => ['value' => 'Ногоон'], 
            'green-light' => ['value' => 'Цайвар ногоон'], 
            'gold' => ['value' => 'Алтлаг'], 
            'copper' => ['value' => 'Зэс'], 
            'beige' => ['value' => 'Шаргал цагаан']
        ];
        $parent = TaxonomyManager::register('Color', 'car', null, ['metaKey' => 'colorName']);

        foreach ($colour as $color => $metas) {
            TaxonomyManager::register($color, 'car-colors', $parent->term->id, $metas);
        }

        # Interior Color
        $interior_colour = [
            'black' => ['value' => 'хар'],
            'grey' => ['value' => 'саарал'],
            'white' => ['value' => 'цагаан'],
            'beige' => ['value' => 'шаргал цагаан']
        ];

        $parent = TaxonomyManager::register('Interior color', 'car', null, ['metaKey' => 'colorNameInterior']);

        foreach ($interior_colour as $color => $metas) {
            TaxonomyManager::register($color, 'car-interior-colors', $parent->term->id, $metas);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);

    }
}
