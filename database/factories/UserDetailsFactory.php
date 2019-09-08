<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserDetails;
use Faker\Generator as Faker;

$factory->define(UserDetails::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    return [
        "fullname"=>$faker->name($gender),
        'mobile' => $faker->phoneNumber,
        'gender' => $gender,
        'address' => $faker->address,
        'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'height'=>rand(50, 65),
        'weight'=>rand(50, 80),
        'city'=>$faker->city,
        'thana'=>$faker->streetName,
    ];
});
