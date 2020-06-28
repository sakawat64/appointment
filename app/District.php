<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    public function division()
    {
        return $this->belongsTo('App\Division','division_id');
    }
    public function doctor()
    {
       return $this->hasOneThrough('App\Doctor', 'id');
    }
}
