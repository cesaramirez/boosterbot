<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(App\Models\User::class)->create([
            'name'  => 'César A. Ramírez',
            'email' => 'cesar@elaniin.com',
        ]);

        factory(App\Models\User::class, 3)->create();
    }
}
