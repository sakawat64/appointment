<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
    public function district()
    {
        return $this->belongsTo('App\District','district_id');
    }
    public function appointment()
    {
        return $this->hasMany('App\Appointment', 'id');
    }
}
