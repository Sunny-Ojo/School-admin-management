<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    public function blocked()
    {
        if ($this->blocked_at) {
            return true;
        } else {
            return false;
        }
    }

}