/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vuetify from '../plugins/vuetify';
import Vue from 'vue'
import VueSweetalert2 from 'vue-sweetalert2';

// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';





window.Vue = require('vue').default;
Vue.use(VueSweetalert2);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example', require('./components/ExampleComponent.vue').default);
Vue.component('app-container', require('./components/appContainer.vue').default);
Vue.component('gestion-productos', require('./components/AdminProductos copy.vue').default);
Vue.component('gestion-solicitudes', require('./components/AdminSolicitudes').default);


//Vue.component('productos', require('./components/Productos.vue').default);

Vue.component('admin-productos', require('./components/AdminProductos.vue').default);
Vue.component('profile', require('./components/Modal.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    vuetify: Vuetify,
    vueSweetalert2: VueSweetalert2,
    el: '#app',

});
