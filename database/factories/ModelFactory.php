<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Menu::class, function (Faker\Generator $faker) {
  	return [
		'nama' => $faker->name(),
		'harga' => $faker->numberBetween($min = 10000, $max = 90000),
		'status' => $faker->numberBetween($min = 0, $max = 1),
		'verifikasi' => $faker->numberBetween($min = 0, $max = 1),
	];
});

$factory->define(App\Bahan::class, function (Faker\Generator $faker) {
    return [
			'nama' => $faker->name(),
		    'stock' => $faker->numberBetween($min = 1, $max = 100),
		    'tgl_kadaluarsa' => $faker->date(),
    ];
});

$factory->define(App\BahanMenu::class, function (Faker\Generator $faker) {
	return [
		'menu_id' => $faker->numberBetween($min = 1, $max = 100),
		'bahan_id' => $faker->numberBetween($min = 1, $max = 100),
		'jumlah_bahan' => $faker->numberBetween($min = 1, $max = 100),
	];
});