<?php

namespace Acada\Http\Controllers;

use Illuminate\Http\Request;
use Acada\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use Acada\User;
use Acada\Http\Requests;

use Acada\Repositories\Video\RepositoryInterface as VidRepInt;
use Acada\Repositories\Users\RepositoryInterface as UserRepInt;

class UserController extends Controller
{

    protected
        $video,
        $user;

    public function __construct(VidRepInt $video, UserRepInt $user)
    {
        $this->user = $user;
        $this->video = $video;
    }

    public function edit()
    {
        $user = $this->user->find(Auth::user()->id);
        return view('user.edit_profile', compact('user', $user));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->user->find($id);
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');

        if ($user->save())
            $request->session()->flash('success', 'Patient was successful updated!');

        return redirect('/user/edit');
    }

}
