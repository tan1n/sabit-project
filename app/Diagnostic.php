<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Diagnostic extends Authenticatable
{

    protected function redirectTo()
    {
        return route('diagnostic/login');
    }
}
