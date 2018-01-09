const state = JSON.parse(window.__INITIAL_STATE__).user || {}

const getters = {

}

const actions = {
    getUserGames({ commit, state }) {
        axios.get('/api/games/?steamid=' + state.steam_id)
            .then(response => {
                commit('setUserGames', { games: response.data });
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