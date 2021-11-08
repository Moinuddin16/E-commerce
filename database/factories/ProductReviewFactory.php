<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\ProductReview;

$factory->define(ProductReview::class, function (Faker $faker) {
    return [
        'product_id ' => rand(1,4),
        'user_id '  => 1,
        'review' => $faker->text(200),
        'rating' => rand(1,5),
        'approve' => rand(0,1),
    ];
});
