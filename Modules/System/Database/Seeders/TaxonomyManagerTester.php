<?php

namespace Modules\System\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Managers\TaxonomyManager;

class TaxonomyManagerTester extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear Taxonomy Tables
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \Modules\Content\Entities\TermTaxonomy::whereRaw('1', '1')->delete();
        \Modules\Content\Entities\Term::whereRaw('1', '1')->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insert test taxonomies
        $optionsClean = TaxonomyManager::register('Clean', 'clean');
        $options = ['Exterior', 'Guts', 'Safety', 'Convenience', 'Clean'];
        foreach ($options as $key => $option) {
            TaxonomyManager::register($option, 'clean', $optionsClean->term_id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($optionsClean->id);
    }
}
