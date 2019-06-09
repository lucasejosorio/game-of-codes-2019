<?php

namespace App\Http\Controllers;

use App\Ride;
use App\Transport;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $rides = $user->rides;
        $transports = Transport::orderBy('title', 'desc')->get();
        return view('dashboard', compact('rides', 'transports'));
    }


    public function welcome()
    {
        $rides = Ride::all();
        $transports = Transport::all();

        return view('dashboard', compact('rides','transports'));
    }
}
