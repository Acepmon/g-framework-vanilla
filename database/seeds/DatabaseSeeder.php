<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GroupsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GroupMenuTableSeeder::class);
        $this->call(GroupPermissionTableSeeder::class);

        $this->call(TermTaxonomyTableSeeder::class);
        $this->call(ThemesTableSeeder::class);
        $this->call(ContentsTableSeeder::class);

        // Run Car Module Seeder
         Artisan::call('module:seed Car');
         echo Artisan::output();
    }
}
