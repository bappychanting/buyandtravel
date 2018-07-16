<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'dob' => $faker->dateTimeBetween('-60 years', '-18 years'),
        'contact' => '+880-'.mt_rand(10,99).'-'.mt_rand(1000,9999).'-'.mt_rand(1000,9999),
        'address' => $faker->address,
        'gender' => mt_rand(1,3),
        'verified' => 0,
        'avatar' => 'default.jpg',
        'role' => 3,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\ProductType::class, function (Faker $faker) {
    return [
        'product_type' => $faker->catchPhrase($maxNbChars = 2),
    ];
});

$factory->define(App\Order::class, function (Faker $faker) {
    $userIds = App\User::all()->pluck('id')->toArray();
    $productTypeIds = App\ProductType::all()->pluck('id')->toArray();

    return [
        'product_name' => $faker->catchPhrase($maxNbChars = 5),
        'product_type_id' => $faker->randomElement($productTypeIds),
        'delivery_location' => $faker->address,
        'expected_price' => mt_rand(100,9999),
        'reference_link' => $faker->url,
        'tags' => "order, generated, for, testing, via, factory",
        'additional_details' => join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
        'views' => mt_rand(0,9999),
        'user_id' => $faker->randomElement($userIds),
    ];
});
