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
        $this->call(ConfigsTableSeeder::class);
        $this->call(GroupsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TermTaxonomyTableSeeder::class);
        $this->call(AdministratorMenusSeeder::class);
        $this->call(ThemesTableSeeder::class);
        // $this->call(PagesSeeder::class);
        $this->call(PermissionsSeeder::class);

        $this->call(NotificationTemplatesSeeder::class);
        $this->call(NotificationEventsSeeder::class);
        $this->call(NotificationChannelsSeeder::class);
        $this->call(NotificationTriggersSeeder::class);
    }
}
