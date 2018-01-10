const state = JSON.parse(window.__INITIAL_STATE__).user || {}

const getters = {
    filteredGames: (state) => (filter) => {
        return state.games.filter(function (game) {
            return game.name.toLowerCase().includes(filter.toLowerCase());
        });
    },
    selectedGames: (state) => {
        return state.games.filter(function (game) {
            return game.selected;
        });
    }
}

const actions = {
}

const mutations = {
    toggleGame: (state, payload) => {
        let gameIndex = state.games.findIndex(function (game) {
            return game.appid == payload.game.appid;
        });

        if (gameIndex >= 0) {
            let game = state.games.splice(gameIndex, 1)[0];
            game.selected = !game.selected;
            state.games.splice(gameIndex, 0, game);
        }
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}