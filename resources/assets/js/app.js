
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
