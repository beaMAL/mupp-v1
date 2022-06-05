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
                                                <v-btn
                                                    text
                                                    color="deep-purple accent-4"
                                                    @click="addfavorito"
                                                >
                                                    REGISTRAR
                                                </v-btn>
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
                                                        </v-btn>
                                                    </template>
                                                    <v-card>
                                                        <v-card-title>
                                                            <span
                                                                class="text-h5"
                                                                >{{
                                                                    formTitle
                                                                }}</span
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
                                                                            v-model="
                                                                                editedItem.nombre
                                                                            "
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
                                                                            v-model="
                                                                                editedItem.marca
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
                                                                            v-model="
                                                                                editedItem.categoria
                                                                            "
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
                                                                            v-model="
                                                                                editedItem.tipo
                                                                            "
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
                                                                            v-model="
                                                                                editedItem.descripcion
                                                                            "
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
                                                                            v-model="
                                                                                editedItem.precio
                                                                            "
                                                                            label="Precio"
                                                                            required
                                                                        ></v-text-field>
                                                                    </v-col>
                                                                    <v-col
                                                                        cols="12"
                                                                        sm="6"
                                                                    >
                                                                        <v-text-field
                                                                            v-model="
                                                                                editedItem.ean
                                                                            "
                                                                            label="EAN"
                                                                        ></v-text-field>
                                                                    </v-col>
                                                                    <v-col
                                                                        cols="12"
                                                                    >
                                                                        <v-text-field
                                                                            v-model="
                                                                                editedItem.web
                                                                            "
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
                                                                            v-model="
                                                                                editedItem.tono
                                                                            "
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
                                                        <td>255</td>
                                                        <td class=" ">
                                                            <v-row
                                                                class="flex-wrap justify-space-between"
                                                            >
                                                                <v-col cols="6">
                                                                    <v-rating
                                                                        :value="
                                                                            4.5
                                                                        "
                                                                        color="amber"
                                                                        class="p-0"
                                                                        half-increments
                                                                        readonly
                                                                        size="18"
                                                                        >4.5</v-rating
                                                                    >
                                                                </v-col>
                                                                <v-col
                                                                    cols="2"
                                                                    class="centradito verticalalign"
                                                                >
                                                                    <span
                                                                        align-self
                                                                        >2</span
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
                                <p class="text-justify">
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
                                                <p>{{ item.precio }}</p>
                                            </template>
                                        </v-tooltip>
                                    </v-col>
                                </v-row>
                            </v-card-text>
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
            item: [],
            logueado: false,
        };
    },
    watch: {},
    computed: {},
    methods: {
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
        //comprobar si l usuario ha inicado sesion
    },
};
</script>
<style scoped>
.verticalalign {
    vertical-align: baseline;
}
.detalles {
    align-items: center;
    display: flex;
    width: 100%;
    margin-bottom: 16px;
    border-top: 1px solid #e9e9e9;
    border-bottom: 1px solid #e9e9e9;
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

