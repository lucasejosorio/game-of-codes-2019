<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\StoreComment;
use App\Ride;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

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

    /**
     * a user can delete his own comments
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function delete($id)
    {
        $comment = Comment::find($id);

        $response = $comment->delete();

        if (!$response) {
            return response()->json([
                'message' => 'Whoops, um erro inesperado ocorreu',
            ]);
        }

        return response()->json([
            'message' => 'Comentário excluído',
        ]);
    }
}
