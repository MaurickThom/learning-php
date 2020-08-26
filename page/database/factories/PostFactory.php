<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

// es como un mock ?
// para que esto funcione tengo que configurar los seeders
$factory->define(Post::class, function (Faker $faker) {

    $title = $faker->sentence;
    return [
        'title'=>$title,
        'slug'=>Str::slug($title),
        'body' => $faker->text
    ];
});
