<!-- raiz de la app de vue -->
<template v-if="this.$store.state.user.tipo_usuario=='1'">
    <AdminappContainer/>
</template>
<template v-else  class="p-0 ">
    <v-app class="p-0" >
        <v-card class="overflow-hidden p-0">

            <v-app-bar app absolute color="white" flat class="p-0 "height="100%">
                <v-row class="justify-center  p-0 align-self-end" height="100%" >
                    <v-col cols="12" sm="11" md="9" class="justify-center">
                        <v-row class="justify-center m-0 pb-0">
                            <v-col cols="9" class="pb-0">
                                <v-row v-if="$vuetify.breakpoint.smAndDown" class="justify-start pb-0">
                                    <v-col cols="1" class="mr-2">
                                        <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>
                                    </v-col>
                                    <v-col cols="3" align-self="center">
                                        <v-toolbar-title class=" font-weight-medium text-start">
                                            <span class="font-weight-thin">M</span>UPP
                                        </v-toolbar-title>
                                    </v-col>
                                </v-row>
                                <v-row v-else class="justify-between align-end pb-0 hidden-sm-and-down m-0">
                                    <v-col cols="3">
                                        <v-row class="justify-between pb-0">
                                            <v-col cols="5">
                                                <router-link route to="{ name: 'home' }">
                                                    <v-app-bar-nav-icon style="margin-left:15px">
                                                        <img style="margin-left: 15px; padding-left: 5px"
                                                            :src="logo_src" width="70" height="70" alt="logo" />

                                                    </v-app-bar-nav-icon>
                                                </router-link>
                                            </v-col>
                                            <v-col cols="6" class="justify-between align-self-end">
                                                <v-app-bar-title class="font-weight-medium text-h5 ml-2">
                                                    <span class="font-weight-thin">M</span><span>UPP</span>
                                                </v-app-bar-title>
                                            </v-col>
                                        </v-row>
                                    </v-col>
                                    <v-col cols="8" class="p-0 mb-2 ml-3" >
                                        <v-row class="p-0 justify-center mt-n3 align-items-end">
                                            <v-tabs centered  color="deep-purple mt-n3 accent-4" slider-size="5"
                                               >
                                                <v-tab v-for="(link, i) in links" :key="i" :to="{ name: link.name }"
                                                    exact v-ripple="{ class: 'deep-purple--text' }">
                                                    {{ link.tabname }}
                                                </v-tab>
                                            </v-tabs>
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-col>
                            <v-col cols="2">
                                <template v-if="$store.state.auth">
                                    <v-row>
                                        <v-col cols="12">
                                            <v-menu offset-y transition="slide-y-transition" bottom>
                                                <template v-slot:activator="{ on, attrs }">

                                                    <v-btn icon x-large v-bind="attrs" v-on="on">
                                                        <v-avatar color="deep-purple">
                                                            <v-icon dark color="white">
                                                                mdi-account-circle
                                                            </v-icon>
                                                        </v-avatar>
                                                    </v-btn>
                                                </template>
                                                <v-card>
                                                    <v-list-item-content class="justify-center px-2">
                                                        <div class="mx-auto text-center">
                                                            <v-avatar color="deep-purple">
                                                                <v-icon dark color="white">
                                                                    mdi-account-circle
                                                                </v-icon>
                                                            </v-avatar>
                                                            <h3>{{ $store.state.user.nombre }}</h3>
                                                            <p class="text-caption mt-1">
                                                                {{ $store.state.user.email }}
                                                            </p>
                                                            <p class="text-caption mt-1">
                                                                {{ $store.state.user.tipo_usuario }}
                                                            </p>
                                                            <v-divider class="my-3"></v-divider>
                                                            <v-btn depressed rounded text>
                                                                Perfil
                                                            </v-btn>
                                                            <v-divider class="my-3"></v-divider>
                                                            <v-btn @click="logout" depressed rounded text>
                                                                Logout
                                                            </v-btn>
                                                        </div>
                                                    </v-list-item-content>
                                                </v-card>
                                            </v-menu>

                                        </v-col>
                                    </v-row>
                                </template>

                                <template v-else>
                                    <nav class="enlaces-login justify-end mr-3">
                                        <router-link class="mr-3 texto-lavanda" to="/login"
                                            v-ripple="{ class: 'deep-purple--text' }"> LOGIN </router-link> |
                                        <router-link class="ml-3 texto-lavanda" to="/registro"
                                            v-ripple="{ class: 'deep-purple--text' }"> REGISTRO </router-link>
                                    </nav>

                                </template>
                            </v-col>

                        </v-row>

                    </v-col>
                </v-row>

            </v-app-bar>

            <v-navigation-drawer v-model="drawer" absolute temporary>
                <v-list nav dense>
                    <v-list-item>
                        <v-list-item-content>
                            <v-list-item-avatar>
                                <img :src="logo_src" width="60" height="60">
                            </v-list-item-avatar>
                            <v-list-item-title class=" text-h6 font-weight-medium">
                                <span class="font-weight-thin">M</span>UPP
                            </v-list-item-title>
                            <v-list-item-subtitle>
                                PROFESSIONAL MAKEUP
                            </v-list-item-subtitle>
                        </v-list-item-content>
                    </v-list-item>

                    <v-divider></v-divider>
                     <v-list-item-group v-model="selectedItem" color="deep-purple" active-class="deep-purple--text text--accent-4">
                    <v-list-item
                        v-for="(item, i) in links"
                        :key="i"
                        router
                        :to="item.ruta"
                    >
                        <v-list-item-action>
                            <v-list-item-icon>
                                <v-icon v-text="item.icono"></v-icon>
                            </v-list-item-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title
                                class="text-uppercase font-weight-light text-h6"
                                v-text="item.text"
                                style="font-family: Roboto"
                            ></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                    <v-divider></v-divider>
                </v-list-item-group>
                </v-list>
            </v-navigation-drawer>

            <!-- <v-avatar
                    :color="
                        $vuetify.breakpoint.smAndDown
                            ? 'grey darken-1'
                            : 'transparent'
                    "
                    size="32"
                ></v-avatar> -->


            <!-- <v-avatar
                    class="hidden-sm-and-down"
                    color="grey darken-1 shrink"
                    size="32"
                ></v-avatar> -->

            <v-sheet id="scrolling-techniques-7" class="overflow-y-auto">
                <v-main width="100" class="">
                    <router-view></router-view>
                    <!-- <v-container width="100" fluid>
                <router-view></router-view>
            </v-container> -->
                </v-main>
                <v-footer color="deep-purple  lighten-1" padless>
                    <v-row justify="center" no-gutters>
                        <v-btn v-for="icon in icons" :key="icon" class="mx-4 white--text" icon>
                            <v-icon size="24px">
                                {{ icon }}
                            </v-icon>
                        </v-btn>
                        <v-col class="deep-purple lighten-2 py-4 text-center white--text" cols="12">
                            {{ new Date().getFullYear() }} —
                            <strong>MUPP</strong>
                        </v-col>
                    </v-row>
                </v-footer>
            </v-sheet>
        </v-card>
    </v-app>
</template>
<script>
import AdminappContainer from "./admin/AdminProductosCat";
import { mapGetters } from 'vuex'
// import { getters } from 'vuex';
export default {

    computed: {
        ...mapGetters({
        getAdmin: 'isAdmin'
        }),
        isusuAdmin(){

            return this.$store.state.admin;
        },
        isUser(){
            return this.$store.state.user;
        }

    },
    data () {
        return {
             name:'MuppContainer',
                components: {
                   AdminappContainer,
                },
                selectedItem: 1,
                admin: null,
                drawer: false,
                group: null,
                user: {},
                logo_src:
                    "http://127.0.0.1:8887/images/mupp-psd-estilizado4-sintexto.png",
                links: [
                    { tabname: "Home", name: "home", ruta: "/", active: true, icono: "mdi-home" },
                    { tabname: "Catálogo", name: "catalogo", ruta: "/catalogo", active: false, icono: "mdi-apps" },
                    { tabname: "About", name: "about", ruta: "/404", active: false, icono: "mdi-information" },
                ],
                icons: ["mdi-home", "mdi-email", "mdi-calendar"],
        }


    },
    methods: {
        async logout() {
            await this.$store.dispatch('logout');
            return this.$router.replace('/login');
        }
    },
    mounted(){
         console.log( this.$store.state.user)
         console.log(this.isAdmin)
         console.log(this.isusuAdmin)
         console.log(this.isUser)
    },
    created() {

         console.log(this.isAdmin)
         console.log(this.isusuAdmin)
         console.log(this.isUser)
        //this.admin= this.isAdmin
  }

};
</script>
<style>
@import "http://127.0.0.1:8887/css/pe-icon-7-stroke-copy.css";
@import "http://127.0.0.1:8887/css/dorsin-copy.css";

.texto-lavanda {
    color: #6618af !important;
}

.enlaces-login {
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
}
</style>
