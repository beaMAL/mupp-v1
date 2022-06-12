/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import VueSweetalert2 from 'vue-sweetalert2';
import Vuetify from '../plugins/vuetify';

import axios from 'axios';
import VueAxios from 'vue-axios';
// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';
import AdminappContainer from './components/admin/AdminappContainer.vue';
import Mupp from './components/Mupp.vue';

import store from './vuexstore.js';

/**
 * Importamos vue router con las rutas definidas en routes.js
*/
axios.defaults.withCredentials = true;
axios.defaults.baseURL=process.env.MIX_API_URL;
// console.log(process.env.MIX_API_URL)

import { routes } from './routes';


window.Vue = require('vue').default;
Vue.use(VueSweetalert2);
Vue.use(VueRouter);
Vue.use( VueAxios, axios);




const router = new VueRouter({
    mode: 'history',
    routes: routes
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Metodo de agregar componenetes en vue sin router
 */
Vue.component('app-container', require('./components/admin/AdminappContainer.vue').default);
Vue.component('mupp-container', require('./components/Mupp.vue').default);
// Vue.component('gestion-productos', require('./components/AdminProductosCat.vue').default);
// Vue.component('gestion-solicitudes', require('./components/AdminSolicitudes').default);

//Vue.component('admin-productos', require('./components/AdminProductos.vue').default);

store.dispatch('getUser');
store.dispatch('getAdmin');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    vuetify: Vuetify,
    vueSweetalert2: VueSweetalert2,
    vueRouter: VueRouter,
    el: '#app',
    components:{
        AdminappContainer,
        Mupp
    },
    router : router,
    store: store,
    // render: h => h(Mupp)
});
