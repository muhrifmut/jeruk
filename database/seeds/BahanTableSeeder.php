<?php

use Illuminate\Database\Seeder;

class BahanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Bahan::class, 20)->create();
    }
}
