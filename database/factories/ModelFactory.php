<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'activated' => true,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'email' => $faker->unique()->safeEmail,
        'first_name' => $faker->firstName,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'last_name' => $faker->lastName,
        'password' => bcrypt('password'),
        'remember_token' => null,
        'updated_at' => $faker->dateTime,
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Brand::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->company,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'brand_id' => \App\Models\Brand::inRandomOrder()->first()->id,
        'sku' => $faker->randomNumber(6),
        'name' => ucfirst($faker->unique()->word),
        'msrp' => $faker->randomNumber(4),
        'price' => $faker->randomNumber(4),
        'wholesale_price' => $faker->randomNumber(4),
        'discount_available' => $faker->boolean(),
        'discount' => $faker->randomNumber(2),
        'enabled' => $faker->boolean(),
        'available_date' => $faker->date(),
        'units_in_stock' => $faker->randomNumber(4),
        'units_on_order' => 0,
        'minimal_quantity' => 1,
        'width' => $faker->randomNumber(2),
        'height' => $faker->randomNumber(2),
        'depth' => $faker->randomNumber(2),
        'weight' => $faker->randomNumber(2),
        'description' => $faker->text(),
        'images' => $faker->text(),
        'note' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'deleted_at' => null,
    ];
});

