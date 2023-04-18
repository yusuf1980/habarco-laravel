<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KecamatansTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(BannersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
    }
}
