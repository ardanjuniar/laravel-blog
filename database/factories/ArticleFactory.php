<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use App\Categori;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Article::class, function (Faker $faker) {
    $word = $faker->word;
    return [
        'judul' => Str::slug($faker->unique()->name, '-'),
        'body' => $word,
        'gambar' => $faker->unique()->name,
        'categories_id' => function () {
            return Categori::all()->random();
        },
    ];
});
