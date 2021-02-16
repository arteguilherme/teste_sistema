<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\{ User, Sistema, Justificativa };
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name'     => $faker->name,
        'email'    => $faker->safeEmail,
        'password' => app('hash')->make('123')
    ];
});

$factory->define(Sistema::class, function (Faker $faker) {
    return [
        'descricao' => $faker->sentence,
        'sigla'     => strtoupper(substr($faker->unique()->word, 0, 10)),
        'email'     => $faker->safeEmail,
        'url'       => substr($faker->unique()->url, 0, 50),
        'status'    => $faker->randomElement(['ativo', 'cancelado']),
    ];
});

$factory->define(\App\Justificativa::class, function (Faker $faker) {
    return [
        'sistema_id' => factory(Sistema::class),
        'user_id'    => factory(User::class),
        'descricao'  => $faker->sentence,
    ];
});
