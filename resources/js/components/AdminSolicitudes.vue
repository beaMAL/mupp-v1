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
                :items="solicitudes"
                :search="search"
                sort-by="nombre"

            >
                <template v-slot:[`item.tono`]="{ item }">
                    <v-chip
                        :color='item.tono'
                    >
                        {{ item.tono }}
                    </v-chip>
                </template>
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Solicitudes de Alta Producto</v-toolbar-title>
                        <v-divider class="mx-4" inset vertical></v-divider>
                        <v-spacer></v-spacer>
                        <v-dialog  persistent v-model="dialog" max-width="500px">
                            <!-- <template v-slot:activator="{ on, attrs }">
                                <v-btn
                                    color="purple"
                                    dark
                                    class="mb-2"
                                    v-bind="attrs"
                                    v-on="on"
                                >
                                    Añadir producto
                                </v-btn>
                            </template> -->
                            <v-card>
                                <v-card-title>
                                    <span class="text-h5">Solicitud</span>
                                </v-card-title>

                                <!-- FORMULARIO PRODUCTO -->
                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col cols="12" sm="6" >
                                                <v-text-field
                                                    v-model="editedItem.nombre"
                                                    label="Nombre producto"
                                                    :rules="nombreRules"
                                                    required
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="6" >
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
                                                    v-model="
                                                        editedItem.tipo
                                                    "
                                                    label="Tipo"
                                                    required
                                                ></v-select>
                                            </v-col>
                                            <v-col cols="12" >
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
                                             <v-col cols="12" sm="6" >
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
                                            <v-col cols="12" sm="6" >
                                                <v-text-field
                                                    v-model="editedItem.ean"
                                                    label="EAN"
                                                ></v-text-field>
                                            </v-col>
                                             <v-col cols="12" >
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
                        <v-dialog persistent v-model="dialogDelete" max-width="500px">
                            <v-card>
                                <v-card-title class="text-h5"
                                    >¿Quieres eliminar esta
                                    solicitud?</v-card-title
                                >
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn
                                        color="red darken-1"
                                        text
                                        @click="closeDelete"
                                        >Cancelar</v-btn
                                    >
                                    <v-btn
                                        color="green"
                                        text
                                        @click="deleteItemConfirm"
                                        >OK</v-btn
                                    >
                                    <v-spacer></v-spacer>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
                <template v-slot:[`item.actions`]="{ item }">
                    <v-icon small class="mr-2" @click="editItem(item)">
                        mdi-eye
                    </v-icon>
                    <v-icon small @click="deleteItem(item)" color="red lighten-1">
                        mdi-email-remove
                    </v-icon>
                </template>
                <template v-slot:no-data>
                    <v-btn color="primary" @click="initialize()"> Reset </v-btn>
                </template>
            </v-data-table>
        </v-card>
    </div>
</template>
</template>
<script>
import axios from "axios";
export default {
    name: "solicitudes",
    created() {
        this.initialize();
    },
    data() {
        return {
             nombreRules:[
                v=> !!v || "Introduzca un nombre",
            ],
            marcaRules:[
                 v=> !!v || "Introduzca una marca",
            ],
            catRules: [
                 v=> !!v || "Requerido",
            ],
            descripcionRules: [
                 v=> !!v || "Requerido",
                v=>(v || '').length <= 500 || 'Max 500 caracteres',
            ],
            precioRules: [
                v=> v>0 || "Requerido",
                v=> !!v || "Requerido",
                v=>(v)<= 4000 || 'Max 4000€ precio',
            ],
            tiposRules: [
                v=> !!v || "Requerido",
            ],
            dialog: false,
            dialogDelete: false,
            search: "",
            update: true,
            modal: 0,
            titleModal: "",
            solicitudes: [],
            headers: [
                { text: "Fecha", value: "fecha_modificacion" },
                {
                    text: "Nombre ",
                    align: "start",
                    value: "nombre",
                },
                { text: "Marca", value: "marca" },
                { text: "Categoría", value: "categoria" },
                { text: "Actions", value: "actions", sortable: false },
            ],
             categorias: [
                {text: "Pegamento"},
                {text: "Utensilios"},
                {text: "Ojos"},
                {text: "Labios"},
                {text: "Rostro"},
                {text: "Uñas"},
                {text: "Cabello"},
                {text: "Skincare"},
                {text: "Sangre"},
                {text: "Productos químicos"},
                {text: "Mantenimiento"},
                {text: "Efectos especiales"}

            ],
             tipos: [
                {text: "Pegamento"},
                {text: "Utensilios"},
                {text: "Ojos"},
                {text: "Labios"},
                {text: "Rostro"},
                {text: "Uñas"},
                {text: "Cabello"},
                {text: "Skincare"},
                {text: "Sangre"},
                {text: "Productos químicos"},
                {text: "Mantenimiento"}

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
            },
        }

    },
    methods: {
        async listSolicitudes() {
            const respuesta = await axios.get("solicitudes");
            this.solicitudes = respuesta.data;
        },
         editItem(item) {
            this.editedIndex = this.solicitudes.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },
         deleteItem(item) {
            this.editedIndex = this.solicitudes.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialogDelete = true;
        },
         deleteItemConfirm() {
            this.solicitudes.splice(this.editedIndex, 1);
            this.closeDelete();
        },
        close() {
            this.dialog = false;
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem);

            });
        },
        closeDelete() {
            this.dialogDelete = false;
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem);

            });
        },
        save() {
            if (this.editedIndex > -1) {
                Object.assign(this.solicitudes[this.editedIndex], this.editedItem);
            } else {
                this.solicitudes.push(this.editedItem);
            }
            this.close();
        },
    },
    created() {
        this.listSolicitudes();
    },
     watch: {
        dialog(val) {
            val || this.close();
        },
        dialogDelete(val) {
            val || this.closeDelete();
        },
    },
}
</script>

