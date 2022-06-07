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
import NotFound from './components/NotFound.vue'
import About from './components/About.vue'
import Perfil from './components/Perfil.vue'
import Producto from './components/VistaProducto.vue'

import auth from './middleware/auth'
import admin from './middleware/admin'


export const routes =[

    //revisar rutas, hacer padres e hijas

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
            component: Perfil,
            meta: { middleware: [auth] },
            children: [
                {
                    path : '',
                    redirect: { name: 'perfil.registro'}
                },
                {
                    name:'listaregistro',
                    path:'registro',
                    component: Producto
                },{
                    name:'listaregistros',
                    path:'registros',
                    component: Producto
                },
            ]
        } ,{
            name: 'about',
            path : '/about',
            component: About
        },{
            name: 'admin',
            path : '/admin',
            component: AdminappContainer,
            meta: {
                middleware:[auth, admin],
            },
            children: [
                {

                    path : '',
                    redirect: { name: 'admin.adminproductos'}
                },
                {
                    name: 'admin.adminproductos',
                    path : 'adminproductos',
                    component: AdminProductosCat
                },
                {
                    name: 'admin.adminsolicitudes',
                    path : 'adminsolicitudes',
                    component: AdminSolicitudes,
                }
            ],
        },{

            path: '/404',
            name: '404',
            component: NotFound,
        },
        {
            path: '*',
            redirect: '/404',
        },
    ]

