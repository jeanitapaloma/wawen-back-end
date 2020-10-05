<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => 1,
        'product_name' => 'test product',
        'price'=> 19.00,
        'unit' => 'pcs',
        'description' => $faker->text
    ];
});
