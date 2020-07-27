<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Doctor;
use Faker\Generator as Faker;

$factory->define(Doctor::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->name,
        'designation'=>$faker->jobTitle,
        'chamber_location'=>$faker->address,
        'city'=>rand(0,1)== 0 ? 'Chittagong' : 'Dhaka',
        'phone'=>$faker->phoneNumber,
    ];
});
