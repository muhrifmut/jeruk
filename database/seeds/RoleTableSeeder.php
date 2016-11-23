<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::create([
        	'nama' => 'admin',
        ]);

        \App\Role::create([
        	'nama' => 'pelayan',
        ]);

        \App\Role::create([
        	'nama' => 'koki',
        ]);

        \App\Role::create([
        	'nama' => 'kasir',
        ]);

        \App\Role::create([
        	'nama' => 'pantry',
        ]);

        \App\Role::create([
        	'nama' => 'customerservice',
        ]);
    }
}
