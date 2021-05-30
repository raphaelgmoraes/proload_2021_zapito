<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Recipients;
use Faker\Generator as Faker;

$factory->define(Recipients::class, function (Faker $faker) {
    return [
        
        'first_name'   => $faker->firstNameMale,
        'last_name'    => $faker->lastName,
        'email'        => $faker->email,
        'phone_number' => $faker->e164PhoneNumber,
        'mensagem'     => $faker->text(20)
    ];
});
