<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the Steam authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('steam')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('steam')->user();

        $user->token;
    }
}
