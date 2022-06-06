<!-- raiz de la app de vue -->
<template>
    <v-app>
        <v-card class="overflow-hidden">
            <v-app-bar
                app
                absolute
                color="white"
                flat

            >
                <!-- <v-avatar
                    :color="
                        $vuetify.breakpoint.smAndDown
                            ? 'grey darken-1'
                            : 'transparent'
                    "
                    size="32"
                ></v-avatar> -->
                <router-link route to="{ name: 'home' }">
                     <v-app-bar-nav-icon   style="margin-left:15px" >
                    <img
                        style="margin-left: 15px; padding-left: 5px"
                        :src="logo_src"
                        width="50"
                        height="50"
                        alt="logo"

                    />
                    <v-app-bar-title class="font-weight-medium">
                        <span class="font-weight-thin">M</span>UPP
                    </v-app-bar-title>
                </v-app-bar-nav-icon>
                </router-link>


                <v-tabs centered class="ml-n9" color="deep-purple accent-4" slider-size="5" active-class="" >
                    <v-tab
                        v-for="(link, i) in links"
                        :key="i"
                        :to="{ name: link.name }"
                        exact
                        v-ripple="{ class: 'deep-purple--text' }"

                    >
                        {{ link.tabname }}
                    </v-tab>
                </v-tabs>
                <template v-if="$store.state.auth">


                    <v-row>

                        <v-col cols="12">
                            <v-menu
                             offset-y
                              transition="slide-y-transition"
                              bottom
                             >
                              <template v-slot:activator="{ on, attrs }">

                                <v-btn
                                  icon
                                 x-large
                                  v-bind="attrs"
                                  v-on="on"
                                >
                                 <v-avatar color="indigo">
                                   <v-icon dark color="white">
                                     mdi-account-circle
                                   </v-icon>
                                 </v-avatar>
                                </v-btn>
                              </template>
                              <v-card>
                                  <v-list-item-content class="justify-center">
                                    <div class="mx-auto text-center">
                                      <v-avatar color="indigo">
                                          <v-icon dark color="white">
                                            mdi-account-circle
                                          </v-icon>
                                        </v-avatar>
                                      <h3>{{ $store.state.user.nombre }}</h3>
                                      <p class="text-caption mt-1">
                                        {{ $store.state.user.email }}
                                      </p>
                                      <v-divider class="my-3"></v-divider>
                                      <v-btn
                                        depressed
                                        rounded
                                        text
                                      >
                                        Perfil
                                      </v-btn>
                                      <v-divider class="my-3"></v-divider>
                                      <v-btn
                                        @click="logout"
                                        depressed
                                        rounded
                                        text
                                      >
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
                    <nav class="enlaces-login">
                        <router-link class="mr-3 texto-lavanda" to="/login"  v-ripple="{ class: 'deep-purple--text' }"> LOGIN </router-link> |
                        <router-link class="ml-3 texto-lavanda" to="/registro"  v-ripple="{ class: 'deep-purple--text' }"> REGISTRO </router-link>
                    </nav>

                </template>
                <!-- <v-avatar
                    class="hidden-sm-and-down"
                    color="grey darken-1 shrink"
                    size="32"
                ></v-avatar> -->
            </v-app-bar>
            <v-sheet
                id="scrolling-techniques-7"
                class="overflow-y-auto"

            >
                <v-main width="100" class="">
                    <router-view></router-view>
                    <!-- <v-container width="100" fluid>
                <router-view></router-view>
            </v-container> -->
                </v-main>
                <v-footer color="deep-purple  lighten-1" padless>
                    <v-row justify="center" no-gutters>
                        <v-btn
                            v-for="icon in icons"
                            :key="icon"
                            class="mx-4 white--text"
                            icon
                        >
                            <v-icon size="24px">
                                {{ icon }}
                            </v-icon>
                        </v-btn>
                        <v-col
                            class="deep-purple lighten-2 py-4 text-center white--text"
                            cols="12"
                        >
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
export default {
    data: () => ({
        user: {},
        logo_src:
            "http://127.0.0.1:8887/images/mupp-psd-estilizado4-sintexto.png",
        links: [
            { tabname: "Home", name: "home", ruta: "/", active: true },
            { tabname: "Catálogo", name:"catalogo", ruta: "/catalogo", active: false },
            { tabname: "About", name: "about", ruta: "/perfil", active: false },
        ],
        icons: ["mdi-home", "mdi-email", "mdi-calendar"],
    }),
    methods: {
        async logout(){
           await this.$store.dispatch('logout');
           return this.$router.replace('/login');
        }
    },
};
</script>
<style scoped>
@import "http://127.0.0.1:8887/css/pe-icon-7-stroke-copy.css";
@import "http://127.0.0.1:8887/css/dorsin-copy.css";

.texto-lavanda{
   color: #6618af;
}
.enlaces-login{
    display:flex;
    flex-direction: row;
    flex-wrap: nowrap;
}
</style>
