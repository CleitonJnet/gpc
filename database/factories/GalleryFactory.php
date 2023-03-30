<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Gallery;
use Faker\Generator as Faker;

$factory->define(Gallery::class, function (Faker $faker) {
    return [
        'path' => 'img/imoveis/1/1.jpg',
    ];
});
