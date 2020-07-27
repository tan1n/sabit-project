<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\DoctorCategory;
use Faker\Generator as Faker;

$factory->define(DoctorCategory::class, function (Faker $faker) {

    static $doc=1;

    return [
        'doctor_id'=>$doc++,
        'category_id'=>rand(1,0)== 0 ? 1 : 2
    ];
});
