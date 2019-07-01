<?php

use Illuminate\Database\Seeder;

class AdministratorMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = DB::table('menus')->count();
        for ($i=0; $i < $count; $i++) {
            DB::table('group_menu')->insert(['group_id' => 1, 'menu_id' => ($i+1)]);
        }
    }
}
