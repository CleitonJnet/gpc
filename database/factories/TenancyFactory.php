<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tenancy;
use Faker\Generator as Faker;

$factory->define(Tenancy::class, function (Faker $faker) {
    return [
        'title' => "Título do anúncio",
        'type_rent' => $faker->numberBetween(1, 6),
        'street' => $faker->randomElement(['Rua Dr. Paulo Cesar','Rua Dr. Paulo Alves','Av. Roberto Silveira','Av. Amaral Peixoto','Rua Mariz e Barros']),
        'number' => $faker->numberBetween(100, 999),
        'neighborhood' => $faker->randomElement(['Icaraí','São Fransisco','Ingá','Centro']),
        'city' => 'Niterói',
        'state' => 'RJ',
        'size' => $faker->numberBetween(100, 500),
        'rooms' => $faker->numberBetween(1, 5),
        'bathroom' => $faker->numberBetween(1, 5),
        'park' => $faker->numberBetween(1, 5),
        'pet' => $faker->numberBetween(0, 1),
        'furniture' => $faker->numberBetween(0, 1),
        'transport' => $faker->numberBetween(0, 1),
        'feature' => $faker->text,
        'rent' => $rent = $faker->numberBetween(500, 5000),
        'condominium' => $condominium = $faker->numberBetween(100, 1500),
        'IPTU' => $IPTU = $faker->numberBetween(100, 1000),
        'firefighting' => $firefighting = $faker->numberBetween(10, 100),
        'tot_all' => $rent +$condominium+$IPTU+$firefighting,
    ];
});
