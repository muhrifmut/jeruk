<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
        	'name' => 'Admin',
        	'email' => 'admin@resto.app',
        	'password' => bcrypt('secret'),
            'status' => 'admin',
        ]);

        \App\User::create([
        	'name' => 'Pelayan',
        	'email' => 'pelayan@resto.app',
        	'password' => bcrypt('secret'),
            'status' => 'pelayan',
        ]);

        \App\User::create([
        	'name' => 'Koki',
        	'email' => 'koki@resto.app',
        	'password' => bcrypt('secret'),
            'status' => 'koki',
        ]);

        \App\User::create([
        	'name' => 'Pantry',
        	'email' => 'pantry@resto.app',
        	'password' => bcrypt('secret'),
            'status' => 'pantry',
        ]);

        \App\User::create([
        	'name' => 'Kasir',
        	'email' => 'kasir@resto.app',
        	'password' => bcrypt('secret'),
            'status' => 'kasir',
        ]);

        \App\User::create([
        	'name' => 'Customer Service',
        	'email' => 'customerservice@resto.app',
        	'password' => bcrypt('secret'),
            'status' => 'customerservice',
        ]);
    }
}