
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 const store = new Vuex.Store({
    state: JSON.parse(window.__INITIAL_STATE__) || {},
    mutations: {
        setUserGames(state, payload) {
            state.user = { ...state.user, games: payload.games };
        },
        setUserFriends(state, payload) {
            state.user = { ...state.user, friends: payload.friends };
        }
    },
    actions: {
        getGamesFromSteamId ({ commit }, payload) {
            axios.get('/api/games/?steamid=' + payload.steamid)
                .then(response => {
                    commit('setUserGames', { games: response.data });
                })
                .catch(e => {
                    console.log(e);
                });
        },
        getUserFriends ({ commit }) {
            axios.get('/api/friends')
                .then(response => {                    
                    let friends = response.data.map(function (friend) {
                        friend.selected = false;
                        return friend;
                    });

                    commit('setUserFriends', { friends: friends });
                })
                .catch(e => {
                    console.log(e);
                });
        }
    },
    getters: {
        sortedFriends: (state) => {
            return state.user.friends.sort(function (a, b) {
                // 0 == Offline
                // 1 == Online
                // 2 == Busy
                // 3 == Away
                // 4 == Snooze
                // 5 == LTT
                // 6 == LTP

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
        }
    }
})


import App from './components/App.vue';

const app = new Vue({
    el: '#app', 
    store,
    template: '<App/>',
    components: { App }
});
