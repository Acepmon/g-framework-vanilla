<?php

namespace Modules\Car\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Entities\TaxonomyManager;

class CarManufactureTeslaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teslas = ['Tesla Model S', 'Tesla Model S (40 kW-hr battery pack)', 'Tesla Model S AWD (85 kW-hr battery pack)', 'Tesla Model 3 Long Range', 'Tesla Model 3 Long Range AWD'
        , 'Tesla Model 3 Long Range AWD Performance', 'Tesla Model 3 Long Range AWD', 'Tesla Model 3 Long Range AWD Performance', 'Tesla Model 3 Mid Range'
        , 'Tesla Model 3 Standard Range', 'Tesla Model 3 Standard Range Plus', 'Tesla Model S (60 kW-hr battery pack)', 'Tesla Model S (70 kW-hr battery pack)'
        , 'Tesla Model S (75 kW-hr battery pack)', 'Tesla Model S (85 kW-hr battery pack)', 'Tesla Model S (90 kW-hr battery pack)', 'Tesla Model S 100D'
        , 'Tesla Model S 75D', 'Tesla Model S 75kWh', 'Tesla Model S AWD - 100D', 'Tesla Model S AWD - 60D', 'Tesla Model S AWD - 70D', 'Tesla Model S AWD - 75D'
        , 'Tesla Model S AWD - 85D', 'Tesla Model S AWD - 90D', 'Tesla Model S AWD - P100D', 'Tesla Model S AWD - P85D', 'Tesla Model S AWD - P90D', 'Tesla Model S Long Range'
        , 'Tesla Model S P100D', 'Tesla Model S Performance (19in Wheels)', 'Tesla Model S Performance (21in Wheels)', 'Tesla Model S Standard Range', 'Tesla Model X 100D'
        , 'Tesla Model X 75D', 'Tesla Model X AWD - 100D', 'Tesla Model X AWD - 60D', 'Tesla Model X AWD - 75D', 'Tesla Model X AWD - 90D', 'Tesla Model X AWD - P100D'
        , 'Tesla Model X AWD - P90D', 'Tesla Model X Long Range', 'Tesla Model X P100D', 'Tesla Model X Performance (22in Wheels)'];

        $parent = TaxonomyManager::register('Tesla', 'car-manufacturer');

        foreach ($teslas as $key => $tesla) {
            TaxonomyManager::register($tesla, 'car-tesla', $parent->term->id);
        }

        TaxonomyManager::updateTaxonomyChildrenSlugs($parent->id);
    }
}
