const state = JSON.parse(window.__INITIAL_STATE__).user || {}

const getters = {
    filteredGames: (state) => (filter) => {
        return state.games.filter(function (game) {
            return game.name.toLowerCase().includes(filter.toLowerCase());
        });
    }
}

const actions = {
}

const mutations = {
}

export default {
    state,
    getters,
    actions,
    mutations
}