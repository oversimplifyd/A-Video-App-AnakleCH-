<?php

namespace Acada\Http\Controllers\Auth;

use Acada\User;
use Acada\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Acada\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

use Laravel\Socialite\Facades\Socialite;

class SMAuthController extends Controller
{

    private $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function index()
    {
        return view('login');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        $authenticatedUser = $this->findBySocialMedia($user);
        $this->auth->login($authenticatedUser, true);
        return redirect('/');
    }

    public function findBySocialMedia($user)
    {
        $userInstance = User::firstOrNew(['oauth_id' => $user->token]);
        if ( ! is_null($userInstance->oauth_id))
            return $userInstance;

        $userInstance->oauth_id = $user->token;
        $userInstance->first_name = $user->name;
        $userInstance->email = $user->email;
        $userInstance->username = $user->login;
        $userInstance->save();

        return $userInstance;
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}