<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    protected $attributes = [
        'transport_id', 'venue_start_id', 'venue_destination_id', 'date'
    ];
}
