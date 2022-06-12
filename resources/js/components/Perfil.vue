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
                                                            USUARIO PEPITO
                                                        </v-list-item-title>
                                                        <v-list-item-subtitle>Greyhound divisely
                                                            hello coldly
                                                            fonwderfully</v-list-item-subtitle>
                                                    </v-list-item-content>
                                                </v-list-item>
                                            </v-card-text>
                                            <v-spacer></v-spacer>

                                        </v-card>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card>
                        <div class="al-fondo overflow-visible">
                            <v-card class="margen-top-raitings">
                                <v-row no-gutters justify="center" class="alto align-end" align-content="end">
                                    <v-col cols="10" sm="9">
                                        <v-row>
                                            <v-card class="mt-4 mx-auto" max-width="1400">
                                                <v-sheet class="v-sheet--offset pa-7 mx-auto" color="white"
                                                    elevation="12" max-width="calc(100% - 32px)">
                                                    <v-sparkline :gradient="['#00c6ff', '#F0F', '#FF0']" line-width="2"
                                                        padding="2" smooth="5" auto-draw :labels="labels"
                                                        :value="value"></v-sparkline>
                                                </v-sheet>

                                                <v-card-text class="pt-0">
                                                    <div class="text-h6 font-weight-light mb-2">
                                                        User Registrations
                                                    </div>
                                                    <div class="subheading font-weight-light grey--text">
                                                        Last Campaign Performance
                                                    </div>
                                                    <v-divider class="my-2"></v-divider>
                                                    <v-icon class="mr-2" small>
                                                        mdi-clock
                                                    </v-icon>
                                                    <span class="text-caption grey--text font-weight-light">last
                                                        registration 26 minutes ago</span>
                                                </v-card-text>
                                            </v-card>
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-card>
                        </div>


                        <v-card class="mt-14 overflow-visible">
                            <div class="mx-3 mt-n10 actividad-borde mb-8">
                                <v-card-title class="mx-3 pt-3 pb-3 actividad-borde text-white bg-account-pages">
                                    ACTIVIDAD</v-card-title>
                            </div>
                            <v-row>
                                <v-card>
                                    <v-tabs  background-color="deep-purple accent-4" centered dark
                                        icons-and-text>
                                        <v-tabs-slider></v-tabs-slider>

                                        <v-tab  to="/perfil/lista-registro">
                                            Registros
                                            <v-icon>mdi-phone</v-icon>
                                        </v-tab>

                                        <v-tab  to="/perfil/lista-favorito">
                                            Favoritos
                                            <v-icon>mdi-heart</v-icon>
                                        </v-tab>


                                    </v-tabs>


                                            <v-card flat>
                                                <router-view></router-view>
                                            </v-card>

                                </v-card>
                            </v-row>



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

export default {
    data() {
        return {
            logueado: false,
            dialog: false,
            dialogDelete: false,
            raitings: [],
            value: [0, 2, 5, 9, 5, 10, 3, 5, 2, 1, 0],
            labels: [
                '0',
                '0.50',
                '1.00',
                '1.50',
                '2.00',
                '2.50',
                '3.00',
                '3.50',
                '4.00',
                '4.50',
                '5'
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
                .get("/api/lista-registros-usuario")
                .then((response) => {
                    this.actividades = response.data.data;
                    console.log(this.actividades);
                })
                .catch((error) => { });
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
                    .post(+ "/api/add-favorito", fav)
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
        async listaCalificaciones() {

            const respuesta = await axios
                .get("/api/lista-calificaciones-usuario")
                .then((response) => {
                    console.log(response.data.data);
                    if (response.data.status == 1) {
                        this.raitings = response.data.data;
                        //let redondeo = this.round(this.calificacion.promedio);
                        console.log(this.raitings);
                        //this.calificacion.promedio = redondeo;

                        //console.log(this.calificacion);
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
                .get("/api/producto/" + id_producto)
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
        this.listaCalificaciones();


        //comprobar si l usuario ha inicado sesion
    },
};
</script>
<style scoped>
.v-sheet--offset {
    top: -24px;
    position: relative;
}

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
