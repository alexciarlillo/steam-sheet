<?php namespace App\Repositories;

use App\User;
use GuzzleHttp\Client;

class GameRepository {

    public function __construct(Client $client)
    {
        $this->client = new Client([
            'base_uri' => 'http://api.steampowered.com/IPlayerService/'
        ]);
    }
    
    public function getBySteamId($steamId)
    {
        
        $response = $this->client->get('GetOwnedGames/v0001/', ['query' =>
            [
                'key' => config('services.steam.client_secret'),
                'steamid' => $steamId,
                'include_appinfo' => 1,
                'format' => 'json'
            ]
        ]);

        $data = json_decode($response->getBody()->getContents());
        return collect($data->response->games);
    }
}