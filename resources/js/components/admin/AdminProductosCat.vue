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
                sort-by="nombre"
            >
                <template v-slot:[`item.tono`]="{ item }">
                    <v-chip :color="item.tono">
                        {{ item.tono }}
                    </v-chip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>CATÁLOGO</v-toolbar-title>
                        <v-divider class="mx-4" inset vertical></v-divider>
                        <v-spacer></v-spacer>
                        <v-dialog persistent v-model="dialog" max-width="500px">
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn
                                    @click="update = false"
                                    color="purple"
                                    dark
                                    class="mb-2"
                                    v-bind="attrs"
                                    v-on="on"
                                >
                                    Añadir producto
                                </v-btn>
                            </template>
                            <v-card>
                                <v-card-title>
                                    <span class="text-h5">{{ formTitle }}</span>
                                </v-card-title>

                                <!-- FORMULARIO PRODUCTO -->
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col cols="12" sm="6">
                                                <v-text-field
                                                    v-model="editedItem.nombre"
                                                    label="Nombre producto"
                                                    :rules="nombreRules"
                                                    required
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="6">
                                                <v-text-field
                                                    :rules="marcaRules"
                                                    v-model="editedItem.marca"
                                                    label="Marca"
                                                    required
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="6">
                                                <v-select
                                                    :rules="catRules"
                                                    :items="categorias"
                                                    dense
                                                    outlined
                                                    v-model="
                                                        editedItem.categoria
                                                    "
                                                    label="Categoría"
                                                    required
                                                ></v-select>
                                            </v-col>
                                            <v-col cols="12" sm="6">
                                                <v-select
                                                    :rules="tiposRules"
                                                    :items="tipos"
                                                    dense
                                                    outlined
                                                    v-model="editedItem.tipo"
                                                    label="Tipo"
                                                    required
                                                ></v-select>
                                            </v-col>
                                            <v-col cols="12">
                                                <v-textarea
                                                    :rules="descripcionRules"
                                                    outlined
                                                    v-model="
                                                        editedItem.descripcion
                                                    "
                                                    label="Descripción"
                                                    required
                                                ></v-textarea>
                                            </v-col>
                                            <v-col cols="12" sm="6">
                                                <v-text-field
                                                    :rules="precioRules"
                                                    type="number"
                                                    min="0"
                                                    max="4000"
                                                    prefix="€"
                                                    v-model="editedItem.precio"
                                                    label="Precio"
                                                    required
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="6">
                                                <v-text-field
                                                    v-model="editedItem.ean"
                                                    label="EAN"
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12">
                                                <v-text-field
                                                    v-model="editedItem.web"
                                                    label="Web"
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="8">
                                                <v-color-picker
                                                    hide-canvas
                                                    hide-inputs
                                                    hide-mode-switch
                                                    hide-sliders
                                                    show-swatches
                                                     mode="hexa"
                                                    swatches-max-height="110"
                                                    v-model="editedItem.tono"
                                                    label="Tono"
                                                ></v-color-picker>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                </v-card-text>

                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                        color="red darken-1"
                                        text
                                        @click="close"
                                    >
                                        Cerrar
                                    </v-btn>
                                    <v-btn color="green" text @click="save">
                                        Guardar
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>

                <template v-slot:[`item.actions`]="{ item }">
                    <v-icon
                        small
                        class="mr-2"
                        @click="
                            editItem(item);
                            update = true;
                        "
                    >
                        mdi-pencil
                    </v-icon>
                    <v-icon
                        small
                        @click="deleteItemSweet(item)"
                        color="red lighten-1"
                    >
                        mdi-delete
                    </v-icon>
                </template>
                <template v-slot:no-data>
                    <v-btn color="primary" @click="listProductos()">
                        Reset
                    </v-btn>
                </template>
            </v-data-table>
        </v-card>
    </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

export default {
    name: "panel",
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
            dialog: false,
            dialogDelete: false,
            search: "",
            update: true,
            modal: 0,
            titleModal: "",
            id: 0,
            productos: [],
            editedIndex: -1,
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
                { text: "Tipo", value: "tipo" },
                { text: "Tono", value: "tono" },
                { text: "EAN", value: "ean" },
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
        async listProductos() {
            const respuesta = await axios.get(
                "http://127.0.0.1:8000/productos"
            );
            this.productos = respuesta.data;
        },
        editItem(item) {
            console.log(item);
            this.id = item.id;
            this.editedIndex = this.productos.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
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
                    title: "¿Quieres eliminar este producto?",
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
                                "http://127.0.0.1:8000/productos/" + item.id
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
                            "El producto ha sido eliminado.",
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
        async save() {
            console.log(this.update);
            const swalWithBootstrapButtons = Swal.mixin({
                buttonsStyling: true,
            });
            console.log(this.editedItem);

            if (this.update) {
                this.update = false;
                swalWithBootstrapButtons
                    .fire({
                        title: "¿Quieres guardar cambios en este producto?",
                        text: "No será posible volver atrás",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Guardar!",
                        cancelButtonText: "No, cancelar!",
                        reverseButtons: true,
                        showLoaderOnConfirm: true,
                        preConfirm: async () => {
                            try {
                                let response = await axios.put(
                                    "http://127.0.0.1:8000/productos/" +
                                        this.id,
                                    this.editedItem
                                );
                                this.listProductos();
                                if (response.status != 200) {
                                    console.log(response.data);
                                    throw new Error("Algo fue mal");
                                } else {
                                    console.log(response.data);
                                }
                                this.close();
                                return response.data;
                            } catch (e) {
                                this.$swal.showValidationMessage(
                                    `Peticion fallida: ${e}`
                                );
                            }
                        },
                    })
                    .then((result) => {
                        if (result.isConfirmed & (result.status == 200)) {
                            swalWithBootstrapButtons.fire(
                                "Guardado!",
                                "El producto ha sido añadido.",
                                "success"
                            );
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                "Cancelado",
                                "No se ha añadido ningún producto",
                                "error"
                            );
                        }
                    });
            } else {
                try {
                    let result = await axios.post(
                        "http://127.0.0.1:8000/productos",this.editedItem

                    );
                    this.listProductos();
                    if (result.status != 200) {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    } else {
                        Swal.fire(
                            "Añadido!",
                            "Your file has been added.",
                            "success"
                        );
                    }
                    this.close();
                    return result.data;
                } catch (e) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: `Peticion fallida: ${e}`,
                    });
                }
            }
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
