<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreComment;
use App\Ride;
use App\Traits\RedirectResponse;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    use RedirectResponse;

    /**
     * A user can create a comment in a ride
     *
     * @param StoreComment $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store(StoreComment $request, $id)
    {
        $ride = Ride::find($id);

        $comment = $ride->comments()->create($request->validated());

        if (!$comment) {
            return response()->json([
                'message' => 'Whoops, um erro inesperado ocorreu',
            ]);
        }

        return response()->json([
            'message' => 'Novo comentário cadastrado',
        ]);
    }
}
