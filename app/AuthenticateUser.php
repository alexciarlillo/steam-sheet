<?php namespace App;

use Illuminate\Contracts\Auth\Guard;
use App\Repositories\UserRepository;
use Laravel\Socialite\Contracts\Factory as Socialite;
use App\AuthenticateUserListener;

class AuthenticateUser
{

    protected $users;
    protected $socialite;
    protected $auth;

    public function __construct(UserRepository $users, Socialite $socialite, Guard $auth)
    {
        $this->users = $users;
        $this->socialite = $socialite;
        $this->auth = $auth;
    }
    
    public function execute($hasId, AuthenticateUserListener $listener)
    {
        if (! $hasId) {
            return $this->getAuthorization();
        }

        $user = $this->users->findBySteamIdOrCreate($this->getSteamUser());

        $this->auth->login($user, true);

        return $listener->userHasLoggedIn($user);
    }

    public function getAuthorization()
    {
        return $this->socialite->driver('steam')->redirect();
    }

    public function getSteamUser()
    {
        return $this->socialite->driver('steam')->user();
    }
}
