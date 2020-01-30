<?php

use Illuminate\Database\Seeder;
use Nwidart\Modules\Facades\Module;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (Module::getOrdered() as $module) {
            $name = $module->getName();
            $path = 'Modules\\'.$name.'\Database\Seeders\\'.$name.'DatabaseSeeder';

            if ($this->isModuleEnabled($name)) {
                $this->call($path);
            }
        }
    }

    private function isModuleEnabled($moduleName) {
        $path = storage_path('app/modules_statuses.json');
        if (file_exists($path)) {
            $json = json_decode(file_get_contents($path), true);
            foreach ($json as $module => $boolean) {
                if ($module == $moduleName) {
                    return $boolean;
                }
            }
        }
    }
}
