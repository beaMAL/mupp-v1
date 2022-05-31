/**
 * Aqui crearemos las rutas del frontend para el paner ADMINISTR
 * Usaremos el plugin router
*/

import AdminappContainer from './components/admin/AdminappContainer.vue'
import AdminProductosCat from './components/admin/AdminProductosCat.vue'
import AdminSolicitudes from './components/admin/AdminSolicitudes.vue'
import Home from './components/Home.vue'
import Login from './components/Login.vue'
import Registro from './components/Registro.vue'
import ForgotPasswd from './components/Forgot-password.vue'
import Catalogo from './components/Catalogo.vue'

//Falta crear
import Perfil from './components/Perfil.vue'
import Producto from './components/VistaProducto.vue'

export const routes =[

        {
            name: 'home',
            path : '/',
            component: Home
        },{
            name: 'login',
            path : '/login',
            component: Login
        },{
            name: 'registro',
            path : '/registro',
            component: Registro
        },{
            name: 'forgotPasswd',
            path : '/forgot-password',
            component: ForgotPasswd
        }, {
            name: 'catalogo',
            path : '/catalogo',
            component: Catalogo
        }, {
            name: 'producto',
            path : '/producto/:id',
            component: Producto
        }, {
            name: 'perfil',
            path : '/perfil',
            component: Perfil
        },{
            name: 'adminproductos',
            path : '/admin/adminproductos',
            component: AdminProductosCat
        },
        {
            name: 'adminsolicitudes',
            path : '/admin/adminsolicitudes',
            component: AdminSolicitudes,
        },{
            name: 'admin',
            path : '/admin',
            component: AdminappContainer,
        },
    ]

