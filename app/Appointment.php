<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'doctor_id', 'user_id', 'appointment_date',
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function doctor()
    {
        return $this->belongsTo('App\Doctor','doctor_id');
    }
}
