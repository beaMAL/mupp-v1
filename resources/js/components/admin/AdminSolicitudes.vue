<template>
    <div class="container bg-admin">
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
                    <v-icon small class="mr-2" @click="editItem(item)">
                        mdi-eye
                    </v-icon>
                    <v-icon small @click="deleteItemSweet(item)" color="red lighten-1">
                        mdi-email-remove
                    </v-icon>
                </template>
                <template v-slot:no-data>
                    <v-btn color="primary" @click="listSolicitudes()"> Reset </v-btn>
                </template>
            </v-data-table>
        </v-card>
    </div>
</template>
</template>
<script>
import axios from "axios";
import Swal from "sweetalert2";

export default {
    name: "solicitudes",
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
            id: 0,
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
            },
        }

    },
    methods: {
        async listSolicitudes() {
            const respuesta = await axios.get("/api/solicitudes");
            this.solicitudes = respuesta.data;
        },
         editItem(item) {
             this.id = item.id;
             console.log(this.id);
            // this.editedIndex = this.solicitudes.indexOf(item);
            this.editedItem = {
                nombre: item.nombre,
                marca: item.marca,
                categoria: item.categoria,
                descripcion: item.descripcion,
                precio: item.precio,
                tipo: item.tipo,
                tono: item.tono,
                web: item.web,
                ean: item.ean,
            }
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
            console.log(item);
            console.log(item.id);
            let id = item.id.toString();
            console.log(id);
            swalWithBootstrapButtons
                .fire({
                    title: "¿Quieres eliminar este solicitud?",
                    text: "No será posible volver atrás",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Eliminar!",
                    cancelButtonText: "No, cancelar!",
                    reverseButtons: true,
                    showLoaderOnConfirm: true,
                    preConfirm: async () => {
                        try {
                             console.log('voy a enviar delete');
                            let response = await axios.delete(
                                "/api/solicitudes/" + id
                            );

                             this.listSolicitudes();
                              console.log('enviado...');
                            if (response.status != 200) {
                                 console.log('estatus es distinto de 200');
                                throw new Error("Algo fue mal");

                            }
                             console.log('estatus deberia ser de 200');
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
                        this.listSolicitudes();
                        swalWithBootstrapButtons.fire(
                            "Eliminado!",
                            "El solicitud ha sido eliminado.",
                            "success"
                        );
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            "Cancelado",
                            "No se ha borrado ninguna solicitud",
                            "error"
                        );
                    }
                });
        },
        getNow() {
                const today = new Date();
                const date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
                const time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                const dateTime = date +' '+ time;
                return dateTime;
        },
        close() {
            this.dialog = false;
            this.id =0;
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
        async save(){
            const swalWithBootstrapButtons = Swal.mixin({
                buttonsStyling: true,
            });

             console.log(this.editedItem);

            let color = this.editedItem.tono;
            this.editedItem.tono= color.hex;
            console.log(this.editedItem);

            swalWithBootstrapButtons
                    .fire({
                        title: "¿Quieres añadir este producto al catálogo?",
                        text: "No será posible volver atrás",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Añadir!",
                        cancelButtonText: "No, cancelar!",
                        reverseButtons: true,
                        showLoaderOnConfirm: true,
                        preConfirm: async () => {
                            try {
                                let response = await axios.post(
                                    "/api/producto",
                                    this.editedItem
                                );

                                if (response.status != 200) {
                                    console.log(response.data);
                                    throw new Error("Algo fue mal");
                                }else{
                                    this.eliminarDespuesDePost();
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
                                "El producto ha sido añadido al catálogo",
                                "success"
                            );
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                "Cancelado",
                                "No se ha añadido ningún producto al catálogo",
                                "error"
                            );
                        }
                    });
        },
        async eliminarDespuesDePost(){
              try{
                    console.log('voy a intentar borrar');
                    console.log(this.id);
                    let id = this.id.toString();
                     console.log(id);
                    let result = await axios.delete(
                        "/api/solicitudes/"+ id
                     )
                     this.listSolicitudes();
                    if (result.status != 200) {
                            throw new Error("Algo fue mal al borrar la solicitud");
                    }
                    return result.data;
                }catch (e) {
                    this.$swal.showValidationMessage(
                        `Peticion fallida: ${e}`
                    );
                }
        }

        // save() {
        //     if (this.editedIndex > -1) {
        //         Object.assign(this.solicitudes[this.editedIndex], this.editedItem);
        //     } else {
        //         this.solicitudes.push(this.editedItem);
        //     }
        //     this.close();
        // },
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
<style>
.bg-admin{
    background-color:#e3ddec;
}
</style>

