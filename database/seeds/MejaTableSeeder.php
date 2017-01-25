<?php

use Illuminate\Database\Seeder;

class MejaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Meja::class, 15)->create();
    }
}
