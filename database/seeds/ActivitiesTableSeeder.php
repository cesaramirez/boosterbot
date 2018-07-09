<?php

use Illuminate\Database\Seeder;

class ActivitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(App\Models\Activity::class)->create([
            'description' => 'BoosterSession - Participar',
            'points'      => '100',
        ]);
        factory(App\Models\Activity::class)->create([
            'description' => 'BoosterSession - Ser anfitrión',
            'points'      => '500',
        ]);
        factory(App\Models\Activity::class)->create([
            'description' => 'BoosterSession - Realizar la tarea',
            'points'      => '500',
        ]);
        factory(App\Models\Activity::class)->create([
            'description' => 'Referir a un developer*',
            'points'      => '25000',
        ]);
        factory(App\Models\Activity::class)->create([
            'description' => 'Referir a alguien a una plaza*',
            'points'      => '15000',
        ]);
        factory(App\Models\Activity::class)->create([
            'description' => 'Premio al desempeño',
            'points'      => '2500',
        ]);
        factory(App\Models\Activity::class)->create([
            'description' => 'Premio a la creatividad',
            'points'      => '2500',
        ]);
        factory(App\Models\Activity::class)->create([
            'description' => 'Cumplio un deadline fácil',
            'points'      => '500',
        ]);
        factory(App\Models\Activity::class)->create([
            'description' => 'Cumplio un deadline complicado ',
            'points'      => '2000',
        ]);
        factory(App\Models\Activity::class)->create([
            'description' => 'Referir un cliente menor a $1mil',
            'points'      => '10000',
        ]);
        factory(App\Models\Activity::class)->create([
            'description' => 'Referir un cliente menor a $2mil',
            'points'      => '20000',
        ]);
        factory(App\Models\Activity::class)->create([
            'description' => 'Referir un cliente menor a $3mil',
            'points'      => '30000',
        ]);
        factory(App\Models\Activity::class)->create([
            'description' => 'Dar una charla en El Salvador',
            'points'      => '10000',
        ]);
        factory(App\Models\Activity::class)->create([
            'description' => 'Dar una charla fuera de El Salvador',
            'points'      => '25000',
        ]);
    }
}
