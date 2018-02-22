<?php

use Faker\Generator as Faker;
use App\User;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'quantity' => $faker->numberBetween(1, 10),
        'status' => $faker->randomElement([Product::AVAILABLE_PRODUCT, Product::UNAVAILABLE_PRODUCT]),
        'image' => $faker->randomElement(['book1.jpeg', 'book2.jpeg', 'book3.jpeg']),
        'seller_id' => User::all()->random()->id,
        // bisa juga begini
        // User::inRandomOrder()->first()->id
    ];
});
