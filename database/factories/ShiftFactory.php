<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shift;
use Faker\Generator as Faker;

$factory->define(Shift::class, function (Faker $faker) {
    static $number = 1;
    return [
        'doctor_id'=>$number++,
        'start'=>rand(12,18),
        'end'=>rand(19,24),
        'max_patient'=>50
    ];
});
