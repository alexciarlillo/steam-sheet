import Vue from 'vue';
import Vuex from 'vuex';
import user from './modules/user';
import friends from './modules/friends';
import app from './modules/app';
import * as actions from './actions';
import * as mutations from './mutations';

Vue.use(Vuex);

export default new Vuex.Store({
    actions,
    mutations,
    modules: {
        user,
        friends,
        app
    }
})