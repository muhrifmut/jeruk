<?php

use Illuminate\Database\Seeder;

class BahanMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\BahanMenu::class, 20)->create();
    }
}
