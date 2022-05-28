/**
 * Aqui crearemos las rutas del frontend para el paner ADMINISTR
 * Usaremos el plugin router
*/

import AdminappContainer from './components/admin/AdminappContainer.vue'
import AdminProductosCat from './components/admin/AdminProductosCat.vue'
import AdminSolicitudes from './components/admin/AdminSolicitudes.vue'
import Home from './components/Home.vue'

//Falta crear
import Catalogo from './components/Catalogo.vue'
import Perfil from './components/Perfil.vue'

export const routes =[

        {
            name: 'home',
            path : '/',
            component: Home
        }, {
            name: 'catalogo',
            path : '/catalogo',
            component: Catalogo
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

