<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table='user_tests';

    protected $guarded=[];

    public  function patient()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function diagnostic()
    {
        return $this->belongsTo(Diagnostic::class,'diagnostic_id');
    }
}
