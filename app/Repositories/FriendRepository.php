<?php namespace App\Repositories;

use App\User;
use GuzzleHttp\Client;

class FriendRepository
{

    public function __construct(Client $client)
    {
        $this->client = new Client([
            'base_uri' => 'http://api.steampowered.com/ISteamUser/'
        ]);
    }
    
    public function getForUser($user)
    {
        $friendIds = $this->getFriendIds($user);
        $friends = collect([]);

        while ($friendIds->count() > 99) {
            $profileIdsToFetch = $friendIds->take(99);
            $friendIds = $friendIds->slice(99);

            $friends = $friends->merge($this->getFriendProfiles($profileIdsToFetch));
        }

        // one more call for the remainder
        $friends = $friends->merge($this->getFriendProfiles($friendIds));

        return $friends->toJson();
    }

    protected function getFriendIds($user)
    {
        $response = $this->client->get('GetFriendList/v0001/', ['query' =>
            [
                'key' => config('services.steam.client_secret'),
                'steamid' => $user->steam_id,
                'relationship' => 'friend'
            ]
        ]);

        $data = json_decode($response->getBody()->getContents());
        return collect($data->friendslist->friends)->pluck('steamid');
    }

    protected function getFriendProfiles($friendIds)
    {

        $response = $this->client->get('GetPlayerSummaries/v0002/', ['query' =>
            [
                'key' => config('services.steam.client_secret'),
                'steamids' => $friendIds->implode(','),
            ]
        ]);

        $data = json_decode($response->getBody()->getContents());
        return collect($data->response->players);
    }
}
