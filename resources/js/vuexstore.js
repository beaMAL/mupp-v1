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
        admin: null,
    },
    mutations: {
        SET_USER(state, user){
            state.user = user;
            state.auth= Boolean(user);

        },
        SET_ADMIN(state, admin){
            if(admin){
                state.admin = true;
            }
        }
    },
    getters: {
        user: state => state.user,
         isAdmin: state =>state.admin,
    },
    actions: {

        async logout({ dispatch }){


            await   axios.post("/logout", );

            return dispatch('getUser');

        },
        async login({ dispatch },credenciales){

            await axios.get('/sanctum/csrf-cookie');
            await   axios.post("/login", credenciales);

            return dispatch('getUser', 'getAdmin');

        },
        getUser( { commit }){
            axios.get("/api/user").then((response) => {
                commit('SET_USER', response.data);


                 }).catch((e) => {
                    commit('SET_USER', null);
            })
        }, getAdmin( { commit }){
            axios.get("api/is-admin").then((response) => {
                commit('SET_ADMIN', response);


                 }).catch((e) => {
                    commit('SET_USER', null);
            })
        }
    },
    modules: {},
});
