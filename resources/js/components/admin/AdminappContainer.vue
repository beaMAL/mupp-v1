<template>
    <v-app id="inspire">
        <v-navigation-drawer v-model="drawer" app class="deep-purple lighten-5">
            <v-list disabled>
                <v-list-item>
                    <v-list-item-avatar rounded color="deep-purple lighten-3">
                        <v-icon dark> mdi-account-circle </v-icon>
                    </v-list-item-avatar>
                </v-list-item>

                <v-list-item link>
                    <v-list-item-content>
                        <v-list-item-title class="text-h6">
                            ADMINISTRADOR
                        </v-list-item-title>
                        <v-list-item-subtitle
                            >admin@google.com</v-list-item-subtitle
                        >
                    </v-list-item-content>
                </v-list-item>
            </v-list>
            <v-list nav>
                <!-- <v-subheader>ADMINISTRADOR</v-subheader> -->

                <v-list-item-group v-model="selectedItem" color="deep-purple">
                    <v-list-item
                        v-for="(item, i) in items"
                        :key="i"
                        @click="logout(item.cerrar)"
                        router
                        :to="item.route"
                    >
                        <v-list-item-action>
                            <v-list-item-icon>
                                <v-icon v-text="item.icon"></v-icon>
                            </v-list-item-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title
                                v-text="item.text"
                            ></v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </v-list-item-group>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar height="78px" flat app class="deep-purple lighter-1 text-white">
            <v-app-bar-nav-icon
                color="white"
                @click="drawer = !drawer"
            ></v-app-bar-nav-icon>

            <v-toolbar-title class="font-weight-medium">
                <span class="font-weight-thin">M</span>UPP
            </v-toolbar-title>
        </v-app-bar>

        <v-main >
            <v-container fluid>
                <router-view append></router-view>
            </v-container>
        </v-main>
    </v-app>
</template>
#5D4582

<script>
import axios from "axios";
import panel from "./AdminProductosCat";
import solicitudes from "./AdminSolicitudes";
export default {
    name: "AdminappContainer",
    components: {
        panel,
        solicitudes,
    },
    data: () => ({
        catalogo: 1,
        drawer: null,
        selectedItem: 1,
        items: [
            {
                text: "Admin Catálogo",
                icon: "mdi-tools",
                cerrar: false,
                route: "/admin/adminproductos",
            },
            {
                text: "Admin Solicitudes",
                icon: "mdi-inbox-arrow-down-outline",
                cerrar: false,
                route: "/admin/adminsolicitudes",
            },
            { text: "Cerrar Sesion", icon: "mdi-power", cerrar: true },
        ],
    }),
    methods: {
        logout(cerrar) {
            if (cerrar) {
                axios.post("/logout").then((response) => {
                    window.location.href = "/";
                });
            }
        },
    },
    props: {
        source: String,
    },
};
</script>
