<?php

namespace Modules\Content\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Managers\TaxonomyManager;

class ProvincesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $location = ['Улаанбаатар', 'Дархан', 'Эрдэнэт', 'Архангай', 'Баян-Өлгий', 'Баянхонгор', 'Булган', 'Говь-Алтай', 'Говьсүмбэр', 'Дархан-Уул', 'Дорноговь', 'Дорнод'
            , 'Дундговь', 'Завхан', 'Орхон', 'Өвөрхангай', 'Өмнөговь', 'Сүхбаатар', 'Сэлэнгэ', 'Төв', 'Увс', 'Ховд', 'Хөвсгөл', 'Хэнтий'];

        $parent = TaxonomyManager::register('Area', 'area', null, ['metaKey' => 'area']);
        foreach ($location as $key => $province) {
            TaxonomyManager::register($province, 'provinces', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
