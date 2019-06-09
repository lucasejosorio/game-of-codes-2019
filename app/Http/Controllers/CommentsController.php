<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store($ride_id){
        request()->validate(
            [
                'user' => 'required',
                'text' => 'required'
            ]
        );

        $ride = Ride::find($ride_id);

        $comment = $ride->comments()->create([]);

        return response()->json($comment);
    }
}
