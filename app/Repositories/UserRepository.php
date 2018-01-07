<?php namespace App\Repositories;

use App\User;

class UserRepository {
    
    public function findBySteamIdOrCreate($userData)
    {
        $user = User::firstOrCreate([
            'steam_id' => intval($userData->id),
            'name' => $userData->name
        ]);

        $user->nickname = $userData->nickname;
        $user->avatar = $userData->avatar;

        $user->save();

        return $user;
    }
}