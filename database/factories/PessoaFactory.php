<?php

use Faker\Generator as Faker;

$factory->define(App\Pessoa::class, function (Faker $faker) {
    return [
        'iua'          => $faker->numberBetween($min = 111111111111, $max = 999999999999),
        'nomeCompleto' => $faker->name,
        'cpf'          => $faker->cpf(false),
        'dtNascimento' => $faker->date('d/m/Y', 'now'),
    ];
});
