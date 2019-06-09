<?php

namespace App\Http\Controllers;

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
        return view('home', compact('rides', 'user'));
    }


    public function welcome()
    {
        $user = auth()->user();
        $rides = $user->rides;

        return view('welcome', compact('rides', 'user'));
    }
}
