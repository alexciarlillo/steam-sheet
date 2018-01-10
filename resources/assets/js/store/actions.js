export const getSteamGamesForUser = ({ commit, state }, user) => {
    axios.get('/api/games/?steamid=' + user.steamid)
        .then(response => {
            let games = response.data.map(function (game) {
                game.selected = true;
                return game;
            });

            commit('setSteamGamesForUser', { steamid: user.steamid, games: games });
        })
        .catch(e => {
            console.log(e);
        });
}

