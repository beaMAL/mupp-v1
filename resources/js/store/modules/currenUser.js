const state = {
    user: null
};
const getters = {};
const actions = {
    async login({ dispatch }, credenciales){
        console.log(this.fields.email);
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
};
const mutations = {
    SET_USER(state, user){
        state.user = user;
    }
};

export default{
    namespaces: true,
    state,
    getters,
    actions,
    mutations
}

