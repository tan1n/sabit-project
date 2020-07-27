<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Doctor extends Authenticatable
{

    protected $guarded=[];

    public function shift()
    {
        return $this->hasOne(Shift::class);
    }


    public  function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    protected function redirectTo($request)
    {
        return route('doctor/login');
    }

    public function ratings()
    {
        return Review::where('doctor_id',$this->id)->avg('rating');
    }


    public function reviews()
    {
        return Review::where('doctor_id',$this->id)->get()->count();
    }


    public function allReviews()
    {
        return Review::where('doctor_id',$this->id)->get();
    }
}
