import Vue from 'vue';
import Vuex from 'vuex';
import mutations from "./mutations";
import state from "./state";

Vue.use(Vuex)

const debug = process.env.APP_ENV !== 'production'

export default new Vuex.Store({

    state,
    mutations,
    strict: false
})

