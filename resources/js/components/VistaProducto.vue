<template>
    <v-main class="grey lighten-3">
        <v-btn class=""> ATRAS</v-btn>
        <v-container>
            <v-row style="justify-content: center">
                <v-col cols="12" sm="10">
                    <v-sheet min-height="100vh" rounded="lg">
                        <v-card
                            position="absolute"
                            class="overflow-visible"
                            min-height="30vh"
                            height="35vh"
                            img="http://127.0.0.1:8887/images/lowpoly-purple-degradado.png"
                        >
                            <v-container class="alto" fluid>
                                <v-row
                                    no-gutters
                                    justify="center"
                                    class="alto align-end"
                                    align-content="end"
                                >
                                    <v-col cols="10" sm="10">
                                        <v-card
                                            style="bottom: -80px; z-index: 1"
                                        >
                                            <v-card-text>
                                                <v-list-item three-line>
                                                    <v-list-item-avatar
                                                        tile
                                                        size="80"
                                                        color="grey"
                                                    ></v-list-item-avatar>
                                                    <v-list-item-content>
                                                        <div
                                                            class="text-overline mb-4"
                                                        >
                                                            OVERLINE
                                                        </div>
                                                        <v-list-item-title
                                                            class="text-h5 text-uppercase mb-1"
                                                        >
                                                            {{ item.nombre }}
                                                        </v-list-item-title>
                                                        <v-list-item-subtitle
                                                            >Greyhound divisely
                                                            hello coldly
                                                            fonwderfully</v-list-item-subtitle
                                                        >
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-card-text>
                                            <v-spacer></v-spacer>
                                            <v-card-actions class="justify-end">
                                                <!-- inicio de registro -->
                                                <v-dialog
                                                    persistent
                                                    v-model="dialog"
                                                    max-width="500px"
                                                >
                                                    <template
                                                        v-slot:activator="{
                                                            on,
                                                            attrs,
                                                        }"
                                                    >
                                                        <v-btn
                                                            text
                                                            color="deep-purple accent-4"
                                                            v-bind="attrs"
                                                            v-on="on"
                                                            @click=""
                                                        >
                                                            REGISTRAR
                                                        </v-btn>
                                                        <!-- <v-btn
                                                            @click="
                                                                update = false
                                                            "
                                                            color="purple"
                                                            dark
                                                            class="mb-2"
                                                            v-bind="attrs"
                                                            v-on="on"
                                                        >
                                                            Añadir producto
                                                        </v-btn> -->
                                                    </template>
                                                    <v-card>
                                                        <v-card-title>
                                                            <span
                                                                class="text-h5"
                                                                >Formulario de
                                                                registro</span
                                                            >
                                                        </v-card-title>

                                                        <!-- FORMULARIO PRODUCTO -->
                                                        <v-card-text>
                                                            <v-container>
                                                                <v-row>
                                                                    <v-col
                                                                        cols="12"
                                                                        sm="6"
                                                                    >
                                                                        <v-text-field
                                                                            label="Nombre producto"
                                                                            :rules="
                                                                                nombreRules
                                                                            "
                                                                            required
                                                                        ></v-text-field>
                                                                    </v-col>
                                                                    <v-col
                                                                        cols="12"
                                                                        sm="6"
                                                                    >
                                                                        <v-text-field
                                                                            :rules="
                                                                                marcaRules
                                                                            "
                                                                            label="Marca"
                                                                            required
                                                                        ></v-text-field>
                                                                    </v-col>
                                                                    <v-col
                                                                        cols="12"
                                                                        sm="6"
                                                                    >
                                                                        <v-select
                                                                            :rules="
                                                                                catRules
                                                                            "
                                                                            :items="
                                                                                categorias
                                                                            "
                                                                            dense
                                                                            outlined
                                                                            label="Categoría"
                                                                            required
                                                                        ></v-select>
                                                                    </v-col>
                                                                    <v-col
                                                                        cols="12"
                                                                        sm="6"
                                                                    >
                                                                        <v-select
                                                                            :rules="
                                                                                tiposRules
                                                                            "
                                                                            :items="
                                                                                tipos
                                                                            "
                                                                            dense
                                                                            outlined
                                                                            label="Tipo"
                                                                            required
                                                                        ></v-select>
                                                                    </v-col>
                                                                    <v-col
                                                                        cols="12"
                                                                    >
                                                                        <v-textarea
                                                                            :rules="
                                                                                descripcionRules
                                                                            "
                                                                            outlined
                                                                            label="Descripción"
                                                                            required
                                                                        ></v-textarea>
                                                                    </v-col>
                                                                    <v-col
                                                                        cols="12"
                                                                        sm="6"
                                                                    >
                                                                        <v-text-field
                                                                            :rules="
                                                                                precioRules
                                                                            "
                                                                            type="number"
                                                                            min="0"
                                                                            max="4000"
                                                                            prefix="€"
                                                                            label="Precio"
                                                                            required
                                                                        ></v-text-field>
                                                                    </v-col>
                                                                    <v-col
                                                                        cols="12"
                                                                        sm="6"
                                                                    >
                                                                        <v-text-field
                                                                            label="EAN"
                                                                        ></v-text-field>
                                                                    </v-col>
                                                                    <v-col
                                                                        cols="12"
                                                                    >
                                                                        <v-text-field
                                                                            label="Web"
                                                                        ></v-text-field>
                                                                    </v-col>
                                                                    <v-col
                                                                        cols="12"
                                                                        sm="8"
                                                                    >
                                                                        <v-color-picker
                                                                            hide-canvas
                                                                            hide-inputs
                                                                            hide-mode-switch
                                                                            hide-sliders
                                                                            show-swatches
                                                                            mode="hexa"
                                                                            swatches-max-height="110"
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
                                                            <v-btn
                                                                color="green"
                                                                text
                                                                @click="save"
                                                            >
                                                                Guardar
                                                            </v-btn>
                                                        </v-card-actions>
                                                    </v-card>
                                                </v-dialog>
                                                <!-- fin de registro -->
                                                <v-tooltip bottom>
                                                    <template
                                                        v-slot:activator="{
                                                            on,
                                                            attrs,
                                                        }"
                                                    >
                                                        <v-btn
                                                            icon
                                                            v-bind="attrs"
                                                            v-on="on"
                                                            @click="addfavorito"
                                                        >
                                                            <v-icon
                                                                >mdi-heart</v-icon
                                                            >
                                                        </v-btn>
                                                    </template>
                                                    <span
                                                        >Añadir a
                                                        favoritos</span
                                                    >
                                                </v-tooltip>
                                            </v-card-actions>
                                        </v-card>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card>
                        <div class="al-fondo overflow-visible">
                            <v-card class="margen-top-raitings">
                                <v-row
                                    no-gutters
                                    justify="center"
                                    class="alto align-end"
                                    align-content="end"
                                >
                                    <v-col cols="10" sm="9">
                                        <v-simple-table>
                                            <template v-slot:default>
                                                <thead>
                                                    <tr>
                                                        <th class="text-left">
                                                            Nº REGISTROS
                                                        </th>
                                                        <th class="text-left">
                                                            PROMEDIO
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            {{
                                                                calificacion.numero
                                                            }}
                                                        </td>
                                                        <td class=" ">
                                                            <v-row
                                                                class="flex-wrap justify-space-between"
                                                            >
                                                                <v-col cols="6">
                                                                    <v-rating
                                                                        :value="
                                                                            calificacion.promedio
                                                                        "
                                                                        color="amber"
                                                                        class="p-0"
                                                                        half-increments
                                                                        readonly
                                                                        size="18"
                                                                        >{{
                                                                            calificacion.promedio
                                                                        }}</v-rating
                                                                    >
                                                                </v-col>
                                                                <v-col
                                                                    cols="2"
                                                                    class="centradito verticalalign"
                                                                >
                                                                    <span
                                                                        align-self
                                                                        >({{
                                                                            calificacion.promedio
                                                                        }})</span
                                                                    >
                                                                </v-col>
                                                            </v-row>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </template>
                                        </v-simple-table>
                                    </v-col>
                                </v-row>
                            </v-card>
                        </div>
                        <v-card class="mt-6">
                            <v-card-title>INFO</v-card-title>
                            <v-card-text>
                                <p class="text-justify px-4">
                                    {{ item.descripcion }}
                                </p>
                            </v-card-text>
                            <v-divider class="mx-4"></v-divider>
                            <v-card-text>
                                <v-row
                                    class="detalles justify-center text-center pr-8 pl-8 mx-0"
                                >
                                    <v-col col="6" sm="3">
                                        <span class="overline label"
                                            >MARCA</span
                                        >
                                        <p>{{ item.marca }}</p>
                                    </v-col>
                                    <v-col col="6" sm="3">
                                        <span class="overline label">
                                            TIPO</span
                                        >
                                        <p>{{ item.tipo }}</p>
                                    </v-col>
                                    <v-col col="6" sm="3">
                                        <span class="overline label"
                                            >CATEGORIA</span
                                        >
                                        <p>{{ item.categoria }}</p>
                                    </v-col>
                                    <v-col col="6" sm="3">
                                        <v-tooltip bottom>
                                            <template
                                                v-slot:activator="{ on, attrs }"
                                            >
                                                <span class="overline label">
                                                    PRECIO
                                                    <span
                                                        v-bind="attrs"
                                                        v-on="on"
                                                    >
                                                        (?)
                                                    </span>
                                                </span>
                                                <p>{{ item.precio }} €</p>
                                            </template>
                                            <span
                                                >Precio oficial, pero puedes
                                                encontrarlo a otros
                                                precios</span
                                            >
                                        </v-tooltip>
                                    </v-col>
                                </v-row>
                                <v-divider class="mx-0"></v-divider>
                                <v-row
                                    class="detalles justify-center text-center pr-8 pl-8 mx-0"
                                >
                                    <v-col col="8" sm="4">
                                        <span class="overline label">EAN</span>
                                        <p>{{ item.ean }}</p>
                                    </v-col>
                                    <v-col
                                        col="4"
                                        sm="4"
                                        class="justify-center px-6"
                                    >
                                        <span class="overline label">
                                            TONO</span
                                        >
                                        <div
                                            class="flex flex-wrap justify-center"
                                        >
                                            <v-card
                                                :color="item.tono"
                                                hover
                                                height="45px"
                                                width="145px"
                                            >
                                            </v-card>
                                        </div>
                                    </v-col>
                                    <v-col col="4" sm="4">
                                        <span class="overline label">WEB</span>
                                        <div class="my-2">
                                            <a :href="item.web">
                                                <v-btn
                                                    color="indigo"
                                                    fab
                                                    small
                                                    dark
                                                >
                                                    <v-icon>mdi-web</v-icon>
                                                </v-btn>
                                            </a>
                                        </div>
                                    </v-col>
                                </v-row>
                            </v-card-text>
                        </v-card>
                        <v-card class="mt-14 overflow-visible">
                            <div class="mx-3 mt-n10 actividad-borde mb-8">
                                <v-card-title
                                    class="mx-3 pt-3 pb-3 actividad-borde text-white bg-account-pages"
                                    >ACTIVIDAD</v-card-title
                                >
                            </div>

                            <div>
                                <v-row>
                                    <v-col
                                        v-for="(item, i) in actividades"
                                        :key="i"
                                        cols="12"
                                    >
                                        <v-card>
                                            <v-list-item>
                                                <v-list-item-avatar
                                                    color="grey darken-3"
                                                >
                                                    <v-img
                                                        class="elevation-6"
                                                        alt="avatar"
                                                        src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
                                                    ></v-img>
                                                </v-list-item-avatar>
                                                <v-list-item-content>
                                                    <v-list-item-title
                                                        >Evan
                                                        You</v-list-item-title
                                                    >
                                                </v-list-item-content>
                                            </v-list-item>
                                        </v-card>
                                    </v-col>
                                </v-row>

                                <v-card
                                    color="f7b3fd"
                                    class="mx-auto my-12"
                                    max-width="374"
                                >
                                    <template slot="progress">
                                        <v-progress-linear
                                            color="deep-purple"
                                            height="10"
                                            indeterminate
                                        ></v-progress-linear>
                                    </template>

                                    <v-card-subtitle>
                                        {{ item.tipo }}
                                    </v-card-subtitle>

                                    <v-divider></v-divider>
                                    <v-row align="center" class="mx-0">
                                        <v-rating
                                            :value="4.5"
                                            color="amber"
                                            dense
                                            half-increments
                                            readonly
                                            size="14"
                                        ></v-rating>

                                        <div class="grey--text ms-2">
                                            4.5 (413)
                                        </div>
                                    </v-row>

                                    <v-card-actions class="pt-3 pl-3">
                                        <div class="my-2">
                                            <router-link
                                                :to="'/producto/' + item.id"
                                            >
                                                <v-btn
                                                    color="warning"
                                                    fab
                                                    @click="
                                                        inspeccionarProducto(
                                                            item
                                                        )
                                                    "
                                                    dark
                                                >
                                                    <v-icon>mdi-plus</v-icon>
                                                </v-btn>
                                            </router-link>
                                        </div>
                                        <v-spacer></v-spacer>
                                    </v-card-actions>

                                    <v-divider class="mx-4"></v-divider>
                                </v-card>
                            </div>
                        </v-card>
                    </v-sheet>
                </v-col>
            </v-row>
        </v-container>
    </v-main>
</template>
<script>
import axios from "axios";
import Swal from "sweetalert2";
const ENDPOINT_PATH = "http://127.0.0.1:8000/api/";
export default {
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
            item: [],
            actividades: [],
            calificacion: [],
            logueado: false,
            dialog: false,
            dialogDelete: false,
            modal: 0,
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
    watch: {
        dialog(val) {
            val || this.close();
        },
    },
    computed: {},
    methods: {
        async obteneractividad() {
            let id_producto = this.$route.params.id;
            const respuesta = await axios
                .get(ENDPOINT_PATH + "lista-registros-producto/" + id_producto)
                .then((response) => {
                    this.actividades = response.data;
                })
                .catch((error) => {});
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
                        "http://127.0.0.1:8000/productos",
                        this.editedItem
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
        addfavorito() {
            try {
                let fav = [{ producto_id: this.item.id }, { user_id: 11 }];
                axios
                    .post(ENDPOINT_PATH + "add-favorito", fav)
                    .then((response) => {
                        console.log(response);
                        if (response.status != 200) {
                            if (response.status == 401) {
                                Swal.fire({
                                    icon: "error",
                                    title: "¿No has iniciado sesión?",
                                    text: "Para poder añadir un producto a favorito, antes deber iniciaar sesión",
                                    footer: "dfvdvfd",
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Something went wrong!",
                                });
                            }
                        } else {
                            Swal.fire(
                                "Añadido!",
                                "Your file has been added.",
                                "success"
                            );
                        }
                    })
                    .catch((e) => {
                        console.log(e);
                        if (e.response.status != 200) {
                            if (e.response.status == 401) {
                                Swal.fire({
                                    icon: "error",
                                    title: "¿No has iniciado sesión?",
                                    text: "Para poder añadir un producto a favorito, antes deber iniciaar sesión",
                                    footer: "<a class='text-purple ' href='/login'>Accede a LOGIN</a>",
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Oops...",
                                    text: "Something went wrong!",
                                });
                            }
                        } else {
                            console.log(e);

                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: `Peticion fallida: ${e}`,
                            });
                        }
                    });
            } catch (e) {
                console.log(e);

                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `Peticion fallida: ${e}`,
                });
            }
        },
        round(num) {
            var m = Number((Math.abs(num) * 100).toPrecision(15));
            return (Math.round(m) / 100) * Math.sign(num);
        },
        async promedioCalificacion() {
            let id_producto = this.$route.params.id;
            const respuesta = await axios
                .get(ENDPOINT_PATH + "calcular-media/" + id_producto)
                .then((response) => {
                    console.log(response.data.data);
                    if (response.data.status == 1) {
                        this.calificacion = response.data.data;
                        let redondeo = this.round(this.calificacion.promedio);
                        console.log(redondeo);
                        this.calificacion.promedio = redondeo;

                        console.log(this.calificacion);
                    } else if (response.data.status == 0) {
                        this.calificacion = response.data.data;
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                });
        },
        async listProducto() {
            let id_producto = this.$route.params.id;
            const respuesta = await axios
                .get(ENDPOINT_PATH + "producto/" + id_producto)
                .then((response) => {
                    this.item = response.data;
                    //  (this.item).forEach((element) => {
                    // if(element ==  null){
                    //     element
                    //    }
                    // })
                });
        },
    },
    created() {
        this.listProducto();
        this.obteneractividad();
        this.promedioCalificacion();
        //comprobar si l usuario ha inicado sesion
    },
};
</script>
<style scoped>
.actividad-borde {
    border-radius: 5px;
}
.verticalalign {
    vertical-align: baseline;
}
.detalles {
    align-items: center;
    display: flex;
    width: 100%;

    /* border-top: 1px solid #e9e9e9;
    border-bottom: 1px solid #e9e9e9; */
}
.alto {
    height: 100%;
}
.al-fondo {
    z-index: 0;
}
.margen-top-raitings {
    padding-top: 80px;
}
.centradito {
    vertical-align: inherit;
}
</style>
