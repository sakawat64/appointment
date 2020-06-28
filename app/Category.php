<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function doctor()
    {
        return $this->hasOneThrough('App\Doctor', 'id');
    }
}
