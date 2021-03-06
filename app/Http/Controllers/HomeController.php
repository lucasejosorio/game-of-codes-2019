<?php

namespace App\Http\Controllers;

use App\Ride;
use App\Transport;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $rides = $user->rides()->paginate(10);
        $transports = Transport::orderBy('title', 'desc')->get();
        return view('dashboard', compact('rides', 'transports'));
    }


    public function welcome()
    {
        return view('welcome');
    }
}
