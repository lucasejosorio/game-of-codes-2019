<?php

namespace App\Http\Controllers;

use App\Ride;
use Illuminate\Http\Request;

class RidesController extends Controller
{
    public function create(){
        $user = auth()->user();
        return view('rides.new', compact('user'));
    }

    public function show($ride_id){
        $user = auth()->user();
        $ride = Ride::find($ride_id);
        
        return view('rides.show', compact('user', 'ride'));
    }
}
