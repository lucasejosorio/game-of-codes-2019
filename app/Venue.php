<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $attributes = [
      'title', 'street', 'number', 'latitude', 'longitude'
    ];

}
