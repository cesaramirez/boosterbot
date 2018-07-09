<?php

use Illuminate\Database\Seeder;

class WifiNetworksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(App\Models\WifiNetwork::class)->create([
            'name'       => 'techHub1',
            'key'        => 'T4habLaT3m',
            'description'=> 'Red para computadoras y dispositivos de trabajo.',
        ]);
        factory(App\Models\WifiNetwork::class)->create([
            'name'       => 'techHub6',
            'key'        => 'fa52023b4a',
            'description'=> 'Red exclusiva para dispositivos moviles.',
        ]);
    }
}
