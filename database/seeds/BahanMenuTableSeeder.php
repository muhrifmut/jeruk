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
        factory(App\BahanMenu::class, 20)->create([
            'menu_id' => \App\Menu::orderBy(\DB::raw('RAND()'))->first()->id,
            'bahan_id' => \App\Bahan::orderBy(\DB::raw('RAND()'))->first()->id,
        ]);
    }
}
