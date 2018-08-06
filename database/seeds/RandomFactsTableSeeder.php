<?php

use Illuminate\Database\Seeder;

class RandomFactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(App\Models\RandomFact::class)->create([
            'text' => 'Al igual que mi creador soy amante de Pokemon Go :flushed:'
        ]);
        factory(App\Models\RandomFact::class)->create([
            'text' => 'Fui creado como una idea random de media noche.'
        ]);
        factory(App\Models\RandomFact::class)->create([
            'text' => 'Amo la música \n te dejo una buena playlist: https://spoti.fi/2KvCBls'
        ]);
    }
}
