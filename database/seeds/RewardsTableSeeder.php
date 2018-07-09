<?php

use Illuminate\Database\Seeder;

class RewardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(App\Models\Reward::class)->create([
            'product'  => 'Anker MicroUSB',
            'points'   => '400',
        ]);
        factory(App\Models\Reward::class)->create([
            'product'  => 'Kingston USB 16GB',
            'points'   => '500',
        ]);
        factory(App\Models\Reward::class)->create([
            'product'  => 'Anker Lighting Cable',
            'points'   => '1000',
        ]);
        factory(App\Models\Reward::class)->create([
            'product'  => 'Gift Card Comida $25',
            'points'   => '2500',
        ]);
        factory(App\Models\Reward::class)->create([
            'product'  => 'PowerBank / Anker PowerCore 10000',
            'points'   => '3000',
        ]);
        factory(App\Models\Reward::class)->create([
            'product'  => 'Gift Card Comida $50',
            'points'   => '5000',
        ]);
        factory(App\Models\Reward::class)->create([
            'product'  => 'Amazon Gift Card $50',
            'points'   => '5000',
        ]);
        factory(App\Models\Reward::class)->create([
            'product'  => 'Amazon Gift Card $100',
            'points'   => '10000',
        ]);
        factory(App\Models\Reward::class)->create([
            'product'  => 'Descuento de $100 a deuda existente',
            'points'   => '10000',
        ]);
        factory(App\Models\Reward::class)->create([
            'product'  => 'Bono $300',
            'points'   => '30000',
        ]);
        factory(App\Models\Reward::class)->create([
            'product'  => 'iPad 9.7 con Apple Pencil',
            'points'   => '45000',
        ]);
    }
}
