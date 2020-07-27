<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded=[];

    public function patient()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

}
