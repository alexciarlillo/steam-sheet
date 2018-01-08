<?php namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\GameRepository;

class GamesController extends Controller
{

    public function __construct(GameRepository $games)
    {
        $this->games = $games;
    }
    public function getGames(Request $request)
    {
        $steamId = $request->input('steamid', false);

        return $this->games->getBySteamId($steamId);
    }
}
