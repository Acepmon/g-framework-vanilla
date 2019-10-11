<?php

namespace Modules\System\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

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
        \App\TermTaxonomy::whereRaw('1', '1')->delete();
        \App\Term::whereRaw('1', '1')->delete();
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
