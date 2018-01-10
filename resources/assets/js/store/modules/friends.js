const state = {
    all: []
}

const getters = {
    sortedFriends: (state) => {
        return state.all.sort(function (a, b) {
            // 0 == Offline
            // 1 == Online
            // 2 == Busy
            // 3 == Away
            // 4 == Snooze
            // 5 == LTT
            // 6 == LT

            if (a.personastate === b.personastate) {
                return a.personaname.localeCompare(b.personaname);
            }

            if (a.personastate === 0) {
                return 1;
            }

            if (b.personastate === 0) {
                return -1;
            }

            return a.personastate - b.personastate;
        });
    },

    filteredFriends: (state, getters) => (filter) => {
        return getters.sortedFriends.filter(function (friend) {
            return friend.personaname.toLowerCase().includes(filter.toLowerCase());
        });
    },

    selectedFriends: (state) => {
        return state.all.filter(function (friend) {
            return friend.selected;
        });
    }
}

const actions = {
    getFriends({ commit }) {
        axios.get('/api/friends')
            .then(response => {
                let friends = response.data.map(function (friend) {
                    friend.selected = false;
                    friend.games = [1,2,3];
                    return friend;
                });

                commit('setFriends', { friends: friends });
            })
            .catch(e => {
                console.log(e);
            });
    }
}

const mutations = {
    setFriends(state, payload) {
        state.all = payload.friends;
    }
}

export default {
    state,
    getters,
    actions,
    mutations
}