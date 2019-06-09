<?php

namespace App;

use Carbon\Carbon;
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
    public function start_venue(){
        return $this->belongsTo(Venue::class, 'venue_start_id');
    }

    public function destination_venue(){
        return $this->belongsTo(Venue::class, 'venue_destination_id');
    }

    public function transport(){
        return $this->belongsTo(Transport::class);
    }

    public function getDateAttribute($date){
        return Carbon::parse($date);
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_venues', 'ride_id', 'user_id');
    }
}
