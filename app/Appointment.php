<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Auth;

class Appointment extends Model
{
    //
    protected $guarded=[];

    public function patient()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    public function reviews($doctor_id)
    {
        return Review::where(['user_id'=>Auth::id(),'doctor_id'=>$doctor_id])->get();
    }
}
