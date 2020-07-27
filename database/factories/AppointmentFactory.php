<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Appointment;
use Faker\Generator as Faker;

$factory->define(Appointment::class, function (Faker $faker) {
    return [
        'user_id'=>1,
        'doctor_id'=>1,
        'appointed_at'=>\Carbon\Carbon::now()->toDateTimeString(),
        'paid'=>1,
        'payment_id'=>\Illuminate\Support\Str::random(6)
    ];
});
