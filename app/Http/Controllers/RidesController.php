<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRide;
use App\Ride;
use App\Transport;
use App\Venue;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RidesController extends Controller
{
    private $auth;

    /**
     * RidesController constructor.
     * @param Factory $auth
     */
    public function __construct(Factory $auth)
    {
        $this->auth = $auth;
    }

    /**
     * return a view to create a new ride
     * @return View
     */
    public function create()
    {
        $user = $this->auth->user();
        $transports = Transport::all();
        $venues = Venue::orderby('title')->get();
        return view('rides.new', compact('user', 'transports', 'venues'));
    }

    /**
     * update a given ride resource
     *
     * @param StoreRide $request
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function store(StoreRide $request)
    {
        $user = auth()->user();

        $ride = Ride::where("transport_id", $request->transport_id)
              ->where("venue_start_id", $request->venue_start_id)
              ->where("venue_destination_id", $request->venue_destination_id)
              ->where("date", $request->date)
              ->first();

        if(!isset($ride)){
            $ride = Ride::create($request->validated());
        }

        $ride->users()->attach($user);

        return redirect()->route('dashboard');
    }


    /**
     * Show a given ride
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function show($id)
    {
        $user = $this->auth->user();

        $ride = Ride::find($id);

        $users = $ride->users;

        return view('rides.show', compact('user', 'ride', 'users'));
    }

    /**
     * A user can edit a given ride
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function edit($id)
    {
        $ride = Ride::find($id);

        return view('rides.show', compact('ride'));
    }

    /**
     * update a given ride resource
     *
     * @param StoreRide $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function update(StoreRide $request, $id)
    {
        $ride = Ride::where('id', $id)
                    ->update($request->validated());

        return view('ride.show', compact('ride'));
    }

}
