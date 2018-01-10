export const setSteamGamesForUser = (state, payload) => {
    if(payload.steamid == state.user.steamid) {
        state.user = {...state.user, games: payload.games };
    } else {

        let userIndex = state.friends.all.findIndex(function (friend) {
            return friend.steamid == payload.steamid;
        });

        if(userIndex >= 0)  {
            let user = state.friends.all.splice(userIndex, 1)[0];

            console.log(user);

            user.games = payload.games;

            state.friends.all.splice(userIndex,0,user);
        }
    }
}
