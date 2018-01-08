<?php namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\FriendRepository;

class FriendsController extends Controller
{

    public function __construct(FriendRepository $friends)
    {
        $this->friends = $friends;
    }
    public function getFriends()
    {
        $user = \Auth::user();

        return $this->friends->getForUser($user);
    }
}
