<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\AuthenticateUser;
use App\AuthenticateUserListener;
use App\Http\Controllers\Controller;

class LoginController extends Controller implements AuthenticateUserListener
{
    public function login(AuthenticateUser $authenticator, Request $request)
    {
        $hasId = $request->has('openid_identity');

        return $authenticator->execute($hasId, $this);
    }

    public function userHasLoggedIn($user)
    {
        return redirect('/home');
    }
}
