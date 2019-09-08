<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BloodRequest;
use Faker\Generator as Faker;

$factory->define(BloodRequest::class, function (Faker $faker) {
    $blood = ['a+', 'b+', 'o+', 'ab+', 'a-', 'b-', 'o-', 'ab-'];
    return [
        'location'=>$faker->address,
        'description'=>$faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        'required_date'=>$faker->dateTimeInInterval($startDate = 'now', $interval = '+ 45 days', $timezone = null),
        'blood_group'=>$blood[rand(0, 7)],
    ];
});
