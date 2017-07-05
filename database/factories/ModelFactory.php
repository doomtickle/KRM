<?php

use App\User;
use App\Client;


/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Client::class, function (Faker\Generator $faker) {

    $user = factory(User::class)->create();
    return [
        'name' => $faker->name,
        'created_by' => $user->id,
        'company' => $faker->company,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'comment' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Task::class, function (Faker\Generator $faker) {

    $user = factory(User::class)->create();
    $client = factory(Client::class)->create();
    return [
        'client_id' => $client->id,
        'assigned_to' => $user->id,
        'due_date' => $faker->date(),
        'description' => $faker->sentence(),
    ];
});
