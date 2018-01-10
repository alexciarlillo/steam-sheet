const state = JSON.parse(window.__INITIAL_STATE__).user || {}

const getters = {
    filteredGames: (state) => (filter) => {
        return state.games.filter(function (game) {
            return game.name.toLowerCase().includes(filter.toLowerCase());
        });
    }
}

const actions = {
    getUserGames({ commit, state }) {
        axios.get('/api/games/?steamid=' + state.steam_id)
            .then(response => {
                let games = response.data.map(function (game) {
                    game.selected = true;
                    return game;
                });

                commit('setUserGames', { games: games });
            })
            .catch(e => {
                console.log(e);
            });
    },
}

const mutations = {
    setUserGames(state, payload) {
        state.games = payload.games;
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}