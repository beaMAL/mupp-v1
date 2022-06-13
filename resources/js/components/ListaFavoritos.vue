
<template>
    <div class="container">
        <v-card>
            <v-card-title>
                <v-text-field
                    outlined
                    dense
                    v-model="search"
                    append-icon="mdi-magnify"
                    label="Search"
                    single-line
                    hide-details

                ></v-text-field>
            </v-card-title>
            <v-data-table
                :headers="headers"
                :items="productos"
                :search="search"
                :page.sync="page"
            :items-per-page="itemsPerPage"
                sort-by="nombre"
                 @page-count="pageCount = $event"
                  hide-default-footer
            >
                <template v-slot:[`item.tono`]="{ item }">
                    <v-chip :color="item.tono">
                        {{ item.tono }}
                    </v-chip>
                </template>

                <template v-slot:[`item.actions`]="{ item }">
                    <v-row class="my-1">
                        <v-col cols="5">
                          <router-link :to="'/producto/'+ item.id">
                                                                <v-btn
                                                                fab
                                                                small
                                                                color="warning"
                                                                @click="
                                                                    inspeccionarProducto(
                                                                        item
                                                                    )
                                                                "
                                                                dark
                                                            >
                                                                <v-icon
                                                                    >mdi-plus</v-icon
                                                                >
                                                            </v-btn>
                                                            </router-link>
                        </v-col>
                        <v-col cols="6" class="align-self-center justfy-center">
                            <v-btn small color="red accent-2 align-self-center" @click="deleteItemSweet(item)">
                                 <v-icon small color="white"> mdi-window-close </v-icon>
                            </v-btn>
                        </v-col>
                    </v-row>


                </template>
                <template v-slot:no-data>
                    <v-btn color="primary" @click="listProductos()">
                        Reset
                    </v-btn>
                </template>
            </v-data-table>
            <div class="text-center pt-2">
            <v-pagination color="deep-purple lighten-1" v-model="page" :length="pageCount"></v-pagination>
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
            nombreRules: [(v) => !!v || "Introduzca un nombre"],
            marcaRules: [(v) => !!v || "Introduzca una marca"],
            catRules: [(v) => !!v || "Requerido"],
            descripcionRules: [
                (v) => !!v || "Requerido",
                (v) => (v || "").length <= 500 || "Max 500 caracteres",
            ],
            precioRules: [
                (v) => v > 0 || "Requerido",
                (v) => !!v || "Requerido",
                (v) => v <= 4000 || "Max 4000€ precio",
            ],
            tiposRules: [(v) => !!v || "Requerido"],
            page: 1,
        pageCount: 0,
        itemsPerPage: 8,
            dialog: false,
            dialogDelete: false,
            search: "",
            update: true,
            modal: 0,
            id: 0,
            productos: [],
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

        async listProductos() {
            const respuesta = await axios.get(
                "/api/listar-favoritos"
            );
            this.productos = respuesta.data;
        },

        deleteItemSweet(item) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger",
                },
                buttonsStyling: true,

            });

            swalWithBootstrapButtons
                .fire({
                    title: "¿Quieres eliminar este producto de tus favoritos?",
                    text: "No será posible volver atrás",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Eliminar!",
                    cancelButtonText: "No, cancelar!",
                    reverseButtons: true,
                    showLoaderOnConfirm: true,
                    preConfirm: async () => {
                        try {
                            let response = await axios.delete(
                                "/api/eliminar-favoritos/" + item.id
                            );
                             this.listProductos();
                            if (response.status != 200) {
                                throw new Error("Algo fue mal");
                            }
                            return response.data;
                        } catch (e) {
                            this.$swal.showValidationMessage(
                                `Peticion fallida: ${e}`
                            );
                        }
                    },
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        this.listProductos();
                        swalWithBootstrapButtons.fire(
                            "Eliminado!",
                            "El producto ha sido eliminado de favoritos.",
                            "success"
                        );
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            "Cancelado",
                            "No se ha borrado ningún producto",
                            "error"
                        );
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
        this.listProductos();
    },
};
</script>
<style>
.bg-admin{
    background-color: #eeeeee;
}
</style>
