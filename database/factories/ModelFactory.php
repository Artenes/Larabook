<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Larabook\Models\User::class, function (Faker\Generator $faker) {

    static $password;

    $name = $faker->userName;

    return [

        'name' => $name,
        'email' => $name . '@email.com',
        'password' => $password ?: $password = 'secret',
        'remember_token' => str_random(10),

    ];

});

$factory->define(Larabook\Models\Status::class, function (Faker\Generator $faker) {

    return [

        'body' => $faker->sentence(),
        'user_id' => function () {

            return factory(Larabook\Models\User::class)->create()->id;

        }

    ];

});

