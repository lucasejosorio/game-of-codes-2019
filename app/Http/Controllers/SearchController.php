<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRide;
use App\Ride;
use App\Traits\FormatDistance;
use App\Transport;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class SearchController extends Controller
{
    use FormatDistance;

    /**
     * add filter for events
     * @param SearchRide $request
     * @return Factory|View
     */
    public function filter(SearchRide $request)
    {
        $rides = Ride::select(DB::raw("users.`id`, `transport_id`, `venue_start_id`, `venue_destination_id`, `date`, 111.045*haversine(`latitude`, `longitude`, ". $request->latitude .", ". $request->longitude .") as distance"))
            ->join('venues', 'venues.id', '=', 'rides.venue_destination_id')
            ->join('user_venues', 'rides.id', '=', 'user_venues.ride_id')
            ->join('users', 'users.id', '=', 'user_venues.user_id')
            ->orderBy('distance', 'asc')
            ->paginate(10);

        foreach ($rides AS $ride) {
            $ride->distance = $this->formatDistanceToKm($ride->distance);
        }
        $transports = Transport::all();
        
        return view('search', compact('rides', 'transports'));
    }
}
