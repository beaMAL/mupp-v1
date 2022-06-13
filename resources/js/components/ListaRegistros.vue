
<template>
    <div class="container">
       <v-card class="mt-14 overflow-visible">
                            <!-- <div class="mx-3 mt-n10 actividad-borde mb-8">
                                <v-card-title class="mx-3 pt-3 pb-3 actividad-borde text-white bg-account-pages">
                                    ACTIVIDAD</v-card-title>
                            </div> -->

                            <div>
                                <v-row v-if="actividades">
                                    <v-col v-for="item in actividades" :key="item.id" cols="12">
                                        <v-row justify="center">
                                            <v-card width="85%" class="actividad-bg pb-4 mb-6 align-self-center">
                                                <v-list-item>
                                                    <v-list-item-avatar color="grey darken-3">
                                                        <v-img class="elevation-6" alt="avatar"
                                                             src="https://source.boringavatars.com/beam/120/colors=FF5252,FF7752,FF9A52,FFB752,5E405B"></v-img>

                                                    </v-list-item-avatar>
                                                    <v-list-item-content>
                                                        <v-list-item-title>Evan
                                                            You</v-list-item-title>
                                                    </v-list-item-content>
                                                </v-list-item>
                                                <v-row class="" no-gutters justify="center">
                                                    <v-card width="75%" class="mb-6s">
                                                        <v-row class="detalles justify-start pr-8 pl-0 mx-0">
                                                            <v-col cols="4" sm="4" class="px-2">
                                                                <v-rating :value="
                                                                    item.calificacion
                                                                " color="amber" class="pb-4" half-increments readonly
                                                                    size="18">{{
                                                                            item.calificacion
                                                                    }}</v-rating>
                                                            </v-col>
                                                            <v-col cols="4" sm="4">
                                                                <p>
                                                                    (
                                                                    {{
                                                                            item.calificacion
                                                                    }}
                                                                    )
                                                                </p>
                                                            </v-col>
                                                        </v-row>
                                                        <v-row>
                                                            <v-col cols="12 text-justify p-2 px-7">
                                                                <p> {{ item.review }}</p>

                                                            </v-col>
                                                        </v-row>
                                                    </v-card>

                                                </v-row>
                                                <v-row>
                                                    <v-col cols="12" justify="center">
                                                        <v-row width="75%" class="pb-5 justify-center">
                                                            <v-img :src="item.imagen" max-height="250" max-width="500"
                                                                aspect-ratio="1.7" contain></v-img>

                                                        </v-row>

                                                    </v-col>
                                                </v-row>
                                            </v-card>
                                        </v-row>
                                    </v-col>
                                </v-row>
                                <v-row v-else>

                                    </v-row>
                            </div>
                        </v-card>
    </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

export default {
    name: "listafavoritos",
    data() {
        return {
            user:{},
            actividades: "",
            search: "",
            update: true,
            modal: 0,
            id: 0,
            result: null,
            headers: [
                {
                    text: "Nombre ",
                    align: "start",
                    value: "nombre",
                },
                { text: "Marca", value: "marca" },
                { text: "Categoría", value: "categoria" },
                { text: "Precio (€)", value: "precio" },
                { text: "Tono", value: "tono" },
                { text: "Actions", value: "actions", sortable: false },
            ],
            defaultItem: {
                nombre: "",
                marca: "",
                categoria: "",
                descripcion: "",
                precio: "0.00",
                tipo: "",
                tono: "",
                web: "",
                ean: "",
                id_ultima_modificacion: "",
            },
            editedItem: {
                nombre: "",
                marca: "",
                categoria: "",
                descripcion: "",
                precio: "0.00",
                tipo: "",
                tono: "",
                web: "",
                ean: "",
                id_ultima_modificacion: "",
                f: false
            },
            categorias: [
                { text: "Pegamento" },
                { text: "Utensilios" },
                { text: "Ojos" },
                { text: "Labios" },
                { text: "Rostro" },
                { text: "Uñas" },
                { text: "Cabello" },
                { text: "Skincare" },
                { text: "Sangre" },
                { text: "Productos químicos" },
                { text: "Mantenimiento" },
            ],
            tipos: [
                { text: "Pegamento" },
                { text: "Utensilios" },
                { text: "Ojos" },
                { text: "Labios" },
                { text: "Rostro" },
                { text: "Uñas" },
                { text: "Cabello" },
                { text: "Skincare" },
                { text: "Sangre" },
                { text: "Productos químicos" },
                { text: "Mantenimiento" },
                { text: "Efectos especiales" },
            ],
        };
    },
    computed: {
        formTitle() {
            return this.editedIndex === -1
                ? "Nuevo Producto"
                : "Editar Producto";
        },
    },
    watch: {
        dialog(val) {
            val || this.close();
        },
    },
    methods: {
        inspeccionarProducto(item) {
            console.log(item);
            // this.loading = true;
        },
        async obteneractividad() {
            let id_producto = this.$route.params.id;
            const respuesta = await axios
                .get( "/api/user" )
                .then((response) => {
                    this.user = response.data;
                    console.log(this.user);
                })
        },
        async obteneractividad() {
            let id_producto = this.$route.params.id;
            const respuesta = await axios
                .get( "/api/lista-registros-usuario" )
                .then((response) => {
                    this.actividades = response.data.data;
                    console.log(this.actividades);
                })
                .catch((e) => {
                     if (e.response.status != 200) {
                            if (e.response.status == 0){
                                this.actividades = [{
                                    "review": "ESTE PRODUCTO AÚN NO HA SIDO REGISTRADO",
                                    "calificacion": 0.00,

                                }]
                            }
                             console.log(e);
                     }else{
                         console.log(e);
                     }
                });
        },
        close() {
            this.dialog = false;
            this.id = 0;
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            });
        },

    },
    created() {
        this.obteneractividad();
    },
};
</script>
<style>
.bg-admin{
    background-color: #eeeeee;
}
</style>
