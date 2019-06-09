<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUser;
use App\User;
use Illuminate\Contracts\Auth\Factory;
use Illuminate\Contracts\Filesystem\Filesystem as Storage;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
        if ($this->auth->user()->id != $id) {
            abort(401);
        }
        $file = $request->file('avatar');

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            
            $date = date('HisYmd');
            $extension = $request->avatar->extension();
            $nameFile = "{$id}-{$date}.{$extension}";

            $upload = $request->avatar->store($nameFile);
            
            if (!$upload) {
                return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload');
            }
            $request->request->add(['image' => $nameFile]);
        }

        $userUpdate = User::where('id', $id)
                    ->update($request->except('_token', 'avatar'));
    
        $user = User::where('id', $id)->first();

        return view('users.edit', compact('user'));
    }

}