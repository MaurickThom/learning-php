<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'title'=>$title,
        'slug'=>Str::slug($title),
        'description' => $faker->text,
        'content'=>$faker->text." ".$faker->text." ".$faker->text,
        'path_img'=>"images/3.png"
    ];
});
