const state = {
    user: null,
    admin: 'soy admin',
};
const getters = {
    user: state => state.user,
    isAdmin: state =>state.admin,
   // token: state => state.token,
    check: state => state.user !== null
};
const actions = {
    async login({ dispatch }, credenciales){
        console.log(this.fields.email);
        await axios.get('/sanctum/csrf-cookie');
        await   axios.post("/login", credenciales).then((response) =>{
            return response.data;
        }).catch((err) =>{
            return err.response
        })

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
    SET_USER(state, {user}){
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

