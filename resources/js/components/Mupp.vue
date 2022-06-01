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


                <v-tabs centered class="ml-n9" color="grey darken-1">
                    <v-tab
                        v-for="(link, i) in links"
                        :key="i"
                        router
                        :to="link.name"
                    >
                        {{ link.name }}
                    </v-tab>
                </v-tabs>

                <div>
                    <nav class="enlaces-login">
                        <router-link class="mr-3 texto-lavanda" to="/login"> LOGIN </router-link> |
                        <router-link class="ml-3 texto-lavanda" to="/registro"> REGISTRO </router-link>
                    </nav>

                </div>
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
        logo_src:
            "http://127.0.0.1:8887/images/mupp-psd-estilizado4-sintexto.png",
        links: [
            { name: "home", ruta: "/", active: true },
            { name: "catalogo", ruta: "/catalogo", active: false },
            { name: "about", ruta: "/perfil", active: false },
        ],
        icons: ["mdi-home", "mdi-email", "mdi-calendar"],
    }),
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
