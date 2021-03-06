<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RewardsTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(WifiNetworksTableSeeder::class);
        $this->call(RandomFactsTableSeeder::class);
    }
}
