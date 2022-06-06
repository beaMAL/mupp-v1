import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'
axios.defaults.withCredentials = true;
axios.defaults.baseURL="http://localhost:8000/";

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        user: null,
        auth: false,
    },
    mutations: {
        SET_USER(state, user){
            state.user = user;
            state.auth= Boolean(user);
        }
    },
    getters: {},
    actions: {

        async logout({ dispatch }){


            await   axios.post("/logout", );

            return dispatch('getUser');

        },
        async login({ dispatch },credenciales){

            await axios.get('/sanctum/csrf-cookie');
            await   axios.post("/login", credenciales);

            return dispatch('getUser');

        },
        getUser( { commit }){
            axios.get("/api/user").then((response) => {
                commit('SET_USER', response.data);


                 }).catch((e) => {
                    commit('SET_USER', null);
            })
        }
    },
    modules: {},
});
