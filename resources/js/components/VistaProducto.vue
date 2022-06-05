<template>
    <v-main class="grey lighten-3">
        <v-btn class=""> ATRAS</v-btn>
        <v-container>
            <v-row style="justify-content: center">
                <v-col cols="12" sm="10">
                    <v-sheet min-height="100vh" rounded="lg">
                        <v-card position="absolute" class="overflow-visible" min-height="30vh" height="35vh"
                            img="http://127.0.0.1:8887/images/lowpoly-purple-degradado.png">
                            <v-container class="alto" fluid>
                                <v-row no-gutters justify="center" class="alto align-end" align-content="end">
                                    <v-col cols="10" sm="10">
                                        <v-card style="bottom: -80px; z-index: 1">
                                            <v-card-text>
                                                <v-list-item three-line>
                                                    <v-list-item-avatar tile size="80" color="grey">
                                                    </v-list-item-avatar>
                                                    <v-list-item-content>
                                                        <div class="text-overline mb-4">
                                                            OVERLINE
                                                        </div>
                                                        <v-list-item-title class="text-h5 text-uppercase mb-1">
                                                            {{ item.nombre }}
                                                        </v-list-item-title>
                                                        <v-list-item-subtitle>Greyhound divisely
                                                            hello coldly
                                                            fonwderfully</v-list-item-subtitle>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-card-text>
                                            <v-spacer></v-spacer>
                                            <v-card-actions class="justify-end">
                                                <!-- inicio de registro -->
                                                <v-dialog persistent v-model="dialog" max-width="500px">
                                                    <template v-slot:activator="{
                                                        on,
                                                        attrs,
                                                    }">
                                                        <v-btn text color="deep-purple accent-4" v-bind="attrs"
                                                            v-on="on" @click="">
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
                                                            <span class="text-h5 pr-3">Formulario de
                                                                registro   </span>
                                                                <v-tooltip bottom>
                                                    <template v-slot:activator="{
                                                        on,
                                                        attrs,
                                                    }">
                                                        <span icon v-bind="attrs" v-on="on" >
                                                            <v-icon>mdi-head-question-outline</v-icon>
                                                        </span>
                                                    </template>
                                                    <span>DUDAS:
                                                        PAO o period after opening.
                                                        El «período después de abierto» es el tiempo mínimo después de la apertura del producto cosmético durante el que puede utilizarse sin riesgo para el consumidor.
                                                    </span>
                                                </v-tooltip>
                                                        </v-card-title>

                                                        <!-- FORMULARIO PRODUCTO -->
                                                        <v-card-text>
                                                            <v-container>
                                                                <v-row>
                                                                    <v-col cols="12">
                                                                        <v-file-input v-model="editedItem.files"
                                                                            color="deep-purple accent-4" counter
                                                                            label="Elige una foto" :rules="imagenRule"
                                                                            accept="image/png, image/jpeg, image/bmp"
                                                                            placeholder="Elige una foto"
                                                                            prepend-icon="mdi-camera" outlined
                                                                            :show-size="1000">
                                                                            <template
                                                                                v-slot:selection="{ index, text }">
                                                                                <v-chip v-if="index < 2"
                                                                                    color="deep-purple accent-4" dark
                                                                                    label small>
                                                                                    {{ text }}
                                                                                </v-chip>

                                                                                <span v-else-if="index === 2"
                                                                                    class="text-overline grey--text text--darken-3 mx-2">
                                                                                    +{{ files.length - 2 }} File(s)
                                                                                </span>
                                                                            </template>
                                                                        </v-file-input>
                                                                    </v-col>

                                                                    <v-col cols="12">
                                                                        <v-row>
                                                                            <v-col class="pt-1 pb-0 px-0">
                                                                                <v-subheader class="pl-3 mb-7">
                                                                                    Calificación
                                                                                </v-subheader>

                                                                                <v-slider v-model="editedItem.calificacion" :max="5.00"
                                                                                    color="amber darken-2"
                                                                                    thumb-label="always"
                                                                                    :thumb-size="34"
                                                                                    track-color="deep-purple lighten-3"
                                                                                    val="0.00" step="0.50"></v-slider>

                                                                            </v-col>
                                                                        </v-row>

                                                                    </v-col>
                                                                    <v-col cols="12">
                                                                        <v-textarea
                                                                            v-model="editedItem.review"
                                                                            :rules="
                                                                            descripcionRules
                                                                        " outlined label="Review">
                                                                        </v-textarea>
                                                                    </v-col>
                                                                    <v-col cols="12" sm="6">
                                                                        <v-text-field label="Tamaño
                                                                        " ></v-text-field>
                                                                    </v-col>
                                                                    <v-col cols="12" sm="6">
                                                                         <v-checkbox
                                                                          v-model="editedItem.recompra"
                                                                          label="Recompra"
                                                                          color="orange"
                                                                          :value="recompra"
                                                                          hide-details
                                                                        ></v-checkbox>
                                                                    </v-col>
                                                                     <v-col cols="12" sm="6">
                                                                        <v-select
                                                                        v-model="editedItem.formato"
                                                                        :rules="
                                                                            catRules
                                                                        " :items="
                                                                                formatos
                                                                            " dense outlined label="Formato"
                                                                            required></v-select>
                                                                    </v-col>
                                                                     <v-col cols="12" sm="6">
                                                                        <v-select
                                                                        v-model="editedItem.pao"
                                                                        :items="
                                                                                paos
                                                                            " dense outlined label="Pao"
                                                                            ></v-select>
                                                                    </v-col>
                                                                    <v-col cols="12" sm="6">
                                                                        <v-text-field
                                                                        v-model="editedItem.precio"
                                                                        :rules="
                                                                            precioRules
                                                                        " type="number" min="0" max="4000"
                                                                            prefix="€" label="Precio">
                                                                        </v-text-field>
                                                                    </v-col>
                                                                    <v-col cols="12" sm="6">
                                                                        <v-text-field v-model="editedItem.web" label="WEB"></v-text-field>
                                                                    </v-col>


                                                                        <v-col
                                                                          cols="12"
                                                                          sm="6"

                                                                        >
                                                                          <v-dialog
                                                                            ref="dialog"
                                                                            v-model="fech_comp"
                                                                            :return-value.sync="editedItem.fecha_compra"
                                                                            persistent
                                                                            width="290px"
                                                                          >
                                                                            <template v-slot:activator="{ on, attrs }">
                                                                              <v-text-field
                                                                                v-model="editedItem.fecha_compra"
                                                                                label="Fecha compra producto"
                                                                                prepend-icon="mdi-calendar"
                                                                                readonly
                                                                                v-bind="attrs"
                                                                                v-on="on"
                                                                              ></v-text-field>
                                                                            </template>
                                                                            <v-date-picker
                                                                              v-model="editedItem.fecha_compra"
                                                                               color="deep-purple lighten-1"
                                                                                first-day-of-week="1"
                                                                              scrollable
                                                                            >
                                                                              <v-spacer></v-spacer>
                                                                              <v-btn
                                                                                text
                                                                                color="amber darken-2"
                                                                                @click="fech_comp = false"
                                                                              >
                                                                                Cancel
                                                                              </v-btn>
                                                                              <v-btn
                                                                                text
                                                                                color="primary"
                                                                                @click="$refs.dialog.save(editedItem.fecha_compra)"
                                                                              >
                                                                                OK
                                                                              </v-btn>
                                                                            </v-date-picker>
                                                                          </v-dialog>
                                                                        </v-col>

                                                                     <v-col
                                                                          cols="12"
                                                                          sm="6"

                                                                        >
                                                                          <v-dialog
                                                                            ref="dialog"
                                                                            v-model="fech_open"
                                                                            :return-value.sync="editedItem.fecha_apertura"
                                                                            persistent
                                                                            width="290px"
                                                                          >
                                                                            <template v-slot:activator="{ on, attrs }">
                                                                              <v-text-field
                                                                                v-model="editedItem.fecha_apertura"
                                                                                label="Fecha apertura producto"
                                                                                prepend-icon="mdi-calendar"
                                                                                readonly
                                                                                v-bind="attrs"
                                                                                v-on="on"
                                                                              ></v-text-field>
                                                                            </template>
                                                                            <v-date-picker
                                                                              v-model="editedItem.fecha_apertura"
                                                                               color="deep-purple lighten-1"
                                                                                first-day-of-week="1"
                                                                              scrollable
                                                                            >
                                                                              <v-spacer></v-spacer>
                                                                              <v-btn
                                                                                text
                                                                                color="amber darken-2"
                                                                                @click="fech_open = false"
                                                                              >
                                                                                Cancel
                                                                              </v-btn>
                                                                              <v-btn
                                                                                text
                                                                                color="primary"
                                                                                @click="$refs.dialog.save(editedItem.fecha_apertura)"
                                                                              >
                                                                                OK
                                                                              </v-btn>
                                                                            </v-date-picker>
                                                                          </v-dialog>
                                                                        </v-col>
                                                                     <v-col
                                                                          cols="12"


                                                                        >
                                                                          <v-dialog
                                                                            ref="dialog"
                                                                            v-model="fech_agotado"
                                                                            :return-value.sync="editedItem.fecha_agotado"
                                                                            persistent
                                                                            width="290px"
                                                                          >
                                                                            <template v-slot:activator="{ on, attrs }">
                                                                              <v-text-field
                                                                                v-model="editedItem.fecha_agotado"
                                                                                label="Fecha producto agotado"
                                                                                prepend-icon="mdi-calendar"
                                                                                readonly
                                                                                v-bind="attrs"
                                                                                v-on="on"
                                                                              ></v-text-field>
                                                                            </template>
                                                                            <v-date-picker
                                                                              v-model="editedItem.fecha_agotado"
                                                                               color="deep-purple lighten-1"
                                                                               first-day-of-week="1"
                                                                              scrollable
                                                                            >
                                                                              <v-spacer></v-spacer>
                                                                              <v-btn
                                                                                text
                                                                                color="amber darken-2"
                                                                                @click="fech_agotado = false"
                                                                              >
                                                                                Cancel
                                                                              </v-btn>
                                                                              <v-btn
                                                                                text
                                                                                color="teal accent-3"
                                                                                @click="$refs.dialog.save(editedItem.fecha_agotado)"
                                                                              >
                                                                                OK
                                                                              </v-btn>
                                                                            </v-date-picker>
                                                                          </v-dialog>
                                                                        </v-col>
                                                                    <v-col cols="12">
                                                                        <v-select
                                                                         :items=" familias_color"
                                                                            dense outlined label="Familia de color" >
                                                                        </v-select>
                                                                    </v-col>
                                                                    <v-col cols="12" sm="8">
                                                                        <v-color-picker hide-canvas hide-inputs
                                                                            hide-mode-switch hide-sliders show-swatches
                                                                            mode="hexa" swatches-max-height="110"
                                                                            label="Tono"></v-color-picker>
                                                                    </v-col>
                                                                </v-row>
                                                            </v-container>
                                                        </v-card-text>

                                                        <v-card-actions>
                                                            <v-spacer></v-spacer>
                                                            <v-btn color="amber darken-3" text @click="close">
                                                                Cerrar
                                                            </v-btn>
                                                            <v-btn color="teal accent-3" text @click="save">
                                                                Guardar
                                                            </v-btn>
                                                        </v-card-actions>
                                                    </v-card>
                                                </v-dialog>
                                                <!-- fin de registro -->
                                                <v-tooltip bottom>
                                                    <template v-slot:activator="{
                                                        on,
                                                        attrs,
                                                    }">
                                                        <v-btn icon v-bind="attrs" v-on="on" @click="addfavorito">
                                                            <v-icon>mdi-heart</v-icon>
                                                        </v-btn>
                                                    </template>
                                                    <span>Añadir a
                                                        favoritos</span>
                                                </v-tooltip>
                                            </v-card-actions>
                                        </v-card>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card>
                        <div class="al-fondo overflow-visible">
                            <v-card class="margen-top-raitings">
                                <v-row no-gutters justify="center" class="alto align-end" align-content="end">
                                    <v-col cols="10" sm="9">
                                        <v-row class="detalles pr- pl-2 mx-0">
                                            <v-col cols="4" class="px-1">
                                                <span class="overline label">
                                                    Nº REGISTROS</span>
                                            </v-col>
                                            <v-col cols="8">
                                                <span class="overline label">PROMEDIO
                                                    CALIFICACIONES</span>
                                            </v-col>
                                        </v-row>
                                        <v-divider class="mx-0"></v-divider>
                                        <v-row class="detalles pr-2 pl-2 mx-0">
                                            <v-col cols="4">
                                                <p>{{ calificacion.numero }}</p>
                                            </v-col>
                                            <v-col cols="4" sm="4" class="px-3">
                                                <v-rating :value="
                                                    calificacion.promedio
                                                " color="amber" class="pb-4" half-increments readonly size="18">
                                                     {{   calificacion.promedio }}
                                                </v-rating>
                                            </v-col>
                                            <v-col cols="4" sm="4">
                                                <p>
                                                    (
                                                    {{
                                                            calificacion.promedio
                                                    }}
                                                    )
                                                </p>
                                            </v-col>
                                        </v-row>
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
                                <v-row class="detalles justify-center text-center pr-8 pl-8 mx-0">
                                    <v-col col="6" sm="3">
                                        <span class="overline label">MARCA</span>
                                        <p>{{ item.marca }}</p>
                                    </v-col>
                                    <v-col col="6" sm="3">
                                        <span class="overline label">
                                            TIPO</span>
                                        <p>{{ item.tipo }}</p>
                                    </v-col>
                                    <v-col col="6" sm="3">
                                        <span class="overline label">CATEGORIA</span>
                                        <p>{{ item.categoria }}</p>
                                    </v-col>
                                    <v-col col="6" sm="3">
                                        <v-tooltip bottom>
                                            <template v-slot:activator="{ on, attrs }">
                                                <span class="overline label">
                                                    PRECIO
                                                    <span v-bind="attrs" v-on="on">
                                                        (?)
                                                    </span>
                                                </span>
                                                <p>{{ item.precio }} €</p>
                                            </template>
                                            <span>Precio oficial, pero puedes
                                                encontrarlo a otros
                                                precios</span>
                                        </v-tooltip>
                                    </v-col>
                                </v-row>
                                <v-divider class="mx-0"></v-divider>
                                <v-row class="detalles justify-center text-center pr-8 pl-8 mx-0">
                                    <v-col col="8" sm="4">
                                        <span class="overline label">EAN</span>
                                        <p>{{ item.ean }}</p>
                                    </v-col>
                                    <v-col col="4" sm="4" class="justify-center px-6">
                                        <span class="overline label">
                                            TONO</span>
                                        <div class="flex flex-wrap justify-center">
                                            <v-card :color="item.tono" hover height="45px" width="145px">
                                            </v-card>
                                        </div>
                                    </v-col>
                                    <v-col col="4" sm="4">
                                        <span class="overline label">WEB</span>
                                        <div class="my-2">
                                            <a :href="item.web">
                                                <v-btn color="indigo" fab small dark>
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
                                <v-card-title class="mx-3 pt-3 pb-3 actividad-borde text-white bg-account-pages">
                                    ACTIVIDAD</v-card-title>
                            </div>

                            <div>
                                <v-row>
                                    <v-col v-for="item in actividades" :key="item.id" cols="12">
                                        <v-row justify="center">
                                            <v-card width="85%" class="actividad-bg pb-4 mb-6 align-self-center">
                                                <v-list-item>
                                                    <v-list-item-avatar color="grey darken-3">
                                                        <v-img class="elevation-6" alt="avatar"
                                                            src="https://ui-avatars.com/api/?background=random"></v-img>
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
            imagenRule: [value => !value || value.size < 2000000 || 'El tamaño de la imagen debe ser menor de  MB!'],
            nombreRules: [(v) => !!v || "Introduzca un nombre"],
            marcaRules: [(v) => !!v || "Introduzca una marca"],
            catRules: [(v) => !!v || "Requerido"],
            descripcionRules: [

                (v) => (v || "").length <= 500 || "Max 500 caracteres",
            ],
            precioRules: [
                (v) => v > 0 || "Requerido",

                (v) => v <= 4000 || "Max 4000€ precio",
            ],

            tiposRules: [(v) => !!v || "Requerido"],
            item: [],
            actividades: "",
            logueado: false,
            dialog: false,
            dialogDelete: false,
            value: 0,
            modal: 0,
            fech_comp:0,
            fech_open: 0,
            fech_agotado: 0,
            recompra: false,
            files: [],
            calificacion: "",
            defaultItem: {
                 files: [],
                formato: "",
                categoria: "",
                review: "",
                precio: "0.00",
                calificacion: "",
                tamaño:"",
                familia_color: "",
                tono: "",
                web: "",
                recompra: false,
                pao: "",
                fecha_compra: "",
                fecha_apertura: "",
                fecha_agotado: "",
                id_ultima_modificacion: "",
            },
            editedItem: {
                 files: [],
                formato: "",
                categoria: "",
                review: "",
                precio: "0.00",
                calificacion: "",
                tamaño:"",
                familia_color: "",
                tono: "",
                web: "",
                recompra: false,
                pao: "",
                fecha_compra: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
                fecha_apertura: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
                fecha_agotado: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
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
            formatos: [
                { text: "Sólido" },
                { text: "Barra" },
                { text: "Fluido" },
                { text: "Polvo" },
                { text: "Tubo" },
                { text: "Con aplicador" },

            ],
            familias_color: [
                { text: "Nudes" },
                { text: "Azules" },
                { text: "Celestes" },
                { text: "Violetas" },
                { text: "Morados" },
                { text: "Magentas" },
                { text: "Rosas" },
                { text: "Rojos" },
                { text: "Verdes" },
                { text: "Neutros" },
                { text: "Marrones" },

            ],
            paos: [
                { text: "3 Meses" },
                { text: "6 Meses" },
                { text: "9 Meses" },
                { text: "12 Meses" },
                { text: "18 Meses" },
                { text: "24 Meses" },
                { text: "36 Meses" },
                { text: "No indicado" }

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
        season(val) {
            return this.seasons[val]
        },
        async obteneractividad() {
            let id_producto = this.$route.params.id;
            const respuesta = await axios
                .get(ENDPOINT_PATH + "lista-registros-producto/" + id_producto)
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
        async save() {

            const swalWithBootstrapButtons = Swal.mixin({
                buttonsStyling: true,
            });
            swalWithBootstrapButtons
                    .fire({
                        title: "¿Quieres registrar este producto?",
                        text: "No será posible volver atrás",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Registrar!",
                        cancelButtonText: "No, cancelar!",
                        reverseButtons: true,
                        showLoaderOnConfirm: true,
                        preConfirm: async () => {
                            try {
                                let response = await axios.post(
                                    ENDPOINT_PATH +
                                       "registrar-producto",
                                    this.editedItem
                                );

                                if (response.status != 200) {
                                    console.log("estoy entrando por 1");
                                    console.log(response.data);
                                    throw new Error("Algo fue mal");
                                } else {
                                     console.log("estoy entrando por 2");
                                    console.log(response.data);
                                }
                                this.close();
                                return response.data;
                            } catch (e) {
                                this.close();
                                 console.log("estoy entrando por 3");
                                 swalWithBootstrapButtons.fire(
                                "WOOPS",
                                "No se ha registrado este producto, para poder registrarlo tienes que iniciar sesion",
                                "error"
                            );
                            }
                        },
                    })
                    .then((result) => {
                        if (result.isConfirmed & (result.status == 200)) {
                            swalWithBootstrapButtons.fire(
                                "Guardado!",
                                "El producto ha sido registrado.",
                                "success"
                            );
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            swalWithBootstrapButtons.fire(
                                "Cancelado",
                                "No se ha registrado este producto",
                                "error"
                            );
                        }
                    })
                    .catch((error) => {
                         console.log("estoy entrando por 4");
                          swalWithBootstrapButtons.fire(
                                "Cancelado",
                                "No se ha registrado este producto",
                                "error"
                            );
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
.actividad-bg {
    background-color: #683ab71e;
}

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
