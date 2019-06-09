<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\User;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    private $auth;
    private $storage;

    public function __construct(Factory $auth, Storage $storage)
    {
        $this->auth = $auth;
        $this->storage = $storage;
    }

    public function Show($id) {
        $user = User::where('id', $id)
                    ->first();

        return view('users.show', compact('user'));
    }

    public function Edit($id)
    {
        if ($this->auth->user()->id != $id) {
            abort(401);
        }

        $user = User::where('id', $id)
                    ->first();
       
        return view('users.edit', compact('user'));

    }


    public function Update(UpdateUser $request, $id)
    {   
        $user = auth()->user();
        $image = Image::make($request->avatar);
        $file_name = "/storage/images/".md5(now()).".jpg";
        Storage::put("images/".md5(now()).".jpg", $image->encode('jpg', 75));

        $request->request->add(['image' => $file_name]);

        $userUpdate = User::where('id', $id)
        ->update($request->except('_token', 'avatar'));

        $user = $user->fresh();
        return view('users.edit', compact('user'));
    }

}