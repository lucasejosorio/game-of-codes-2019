<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRide;
use App\Ride;
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

        return view('rides.new', compact('user'));
    }

    /**
     * update a given ride resource
     *
     * @param StoreRide $request
     * @return \Illuminate\Contracts\View\Factory|View
     */
    public function store(StoreRide $request)
    {
        $ride = Ride::create($request->validated());

        if (!$ride) {
            return redirect()
                ->back()
                ->withErrors([
                    'message' => 'whoops, ocorreu um erro ao criar sua corrida',
                ]);
        }

        return view('rides.show', compact('ride'));
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
        
        return view('rides.show', compact('user', 'ride'));
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

        return view('rides.show', compact('ride'));
    }

}
