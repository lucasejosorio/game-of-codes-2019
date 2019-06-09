<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    protected $fillable = [
        'transport_id', 'venue_start_id', 'venue_destination_id', 'date'
    ];

    /**
     * A ride model can have many comments
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
