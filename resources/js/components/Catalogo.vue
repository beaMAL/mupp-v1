<template>
    <v-main class="bg-fondo">
        <v-container>
            <v-row style="justify-content: center">
                <!-- <v-col cols="12" sm="2">
                    <v-sheet rounded="lg" min-height="268">

                    </v-sheet>
                </v-col> -->

                <v-col cols="18" sm="12">
                    <v-sheet min-height="70vh" rounded="lg">
                        <template>
                            <v-container fluid>
                                <v-data-iterator
                                    :items="items"
                                    :items-per-page.sync="itemsPerPage"
                                    :page.sync="page"
                                    :search="search"
                                    :sort-by="sortBy.toLowerCase()"
                                    :sort-desc="sortDesc"
                                    hide-default-footer
                                >
                                    <template v-slot:header>
                                        <v-toolbar
                                            dark
                                            color="amber darken-2"
                                            class="mb-1"
                                        >
                                            <v-text-field
                                                v-model="search"
                                                clearable
                                                flat
                                                solo-inverted
                                                hide-details
                                                prepend-inner-icon="mdi-magnify"
                                                label="Search"
                                            ></v-text-field>
                                            <template
                                                v-if="
                                                    $vuetify.breakpoint.mdAndUp
                                                "
                                            >
                                                <v-spacer></v-spacer>
                                                <v-select
                                                    v-model="sortBy"
                                                    flat
                                                    solo-inverted
                                                    hide-details
                                                    :items="keys"
                                                    prepend-inner-icon="mdi-magnify"
                                                    label="Sort by"
                                                ></v-select>
                                                <v-spacer></v-spacer>
                                                <v-btn-toggle
                                                    v-model="sortDesc"
                                                    mandatory
                                                >
                                                    <v-btn
                                                        large
                                                        depressed
                                                        color="amber darken-1"
                                                        :value="false"
                                                    >
                                                        <v-icon
                                                            >mdi-arrow-up</v-icon
                                                        >
                                                    </v-btn>
                                                    <v-btn
                                                        large
                                                        depressed
                                                        color="amber darken-1"
                                                        :value="true"
                                                    >
                                                        <v-icon
                                                            >mdi-arrow-down</v-icon
                                                        >
                                                    </v-btn>
                                                </v-btn-toggle>
                                            </template>
                                        </v-toolbar>
                                    </template>

                                    <template v-slot:default="props">
                                        <v-row>
                                            <v-col
                                                v-for="(
                                                    item, index
                                                ) in props.items"
                                                :item="item"
                                                :index="index"
                                                :key="item.id"
                                                cols="12"
                                                sm="6"
                                                md="4"
                                                lg="3"
                                            >
                                                <v-card
                                                    color="f7b3fd"
                                                    :loading="loading"
                                                    class="mx-auto my-12"
                                                    max-width="374"
                                                >
                                                    <v-img
                                                        height="200px"
                                                        src="http://127.0.0.1:8887/images/lowpoly-purple-degradado.png"
                                                    >
                                                        <v-toolbar-title
                                                            class="ml-3 white--text"
                                                        >
                                                            <v-spacer></v-spacer>
                                                            Cat.:
                                                            {{
                                                                item.categoria
                                                            }}</v-toolbar-title
                                                        >
                                                        <v-spacer></v-spacer>
                                                        <v-card-title
                                                            class="white--text mt-8"
                                                        >
                                                            <v-avatar
                                                                size="56"
                                                                :color="
                                                                    item.tono
                                                                "
                                                            >
                                                            </v-avatar>
                                                            <p
                                                                class="text-h6 ml-3 mt-3 pl-0"
                                                            >
                                                                {{
                                                                    item.nombre
                                                                }}
                                                            </p>
                                                        </v-card-title>
                                                    </v-img>

                                                    <template slot="progress">
                                                        <v-progress-linear
                                                            color="deep-purple"
                                                            height="10"
                                                            indeterminate
                                                        ></v-progress-linear>
                                                    </template>

                                                    <!-- <v-card-title
                                                        class="subheading font-weight-bold"
                                                    >
                                                        {{ item.nombre }}
                                                    </v-card-title>-->
                                                    <v-card-subtitle>
                                                        {{ item.tipo }}
                                                    </v-card-subtitle>
                                                    <!-- <template>
                                                        <v-chip
                                                            :color=" item.tono"
                                                            :text-color="item.tono"
                                                        >
                                                           ***********
                                                        </v-chip>
                                                    </template> -->

                                                    <v-divider></v-divider>
                                                    <v-row
                                                        align="center"
                                                        class="mx-0"
                                                    >
                                                        <v-rating
                                                            :value="4.5"
                                                            color="amber"
                                                            dense
                                                            half-increments
                                                            readonly
                                                            size="14"
                                                        ></v-rating>

                                                        <div
                                                            class="grey--text ms-2"
                                                        >
                                                            4.5 (413)
                                                        </div>
                                                    </v-row>

                                                    <v-card-actions
                                                        class="pt-3 pl-3"
                                                    >
                                                        <div class="my-2">
                                                            <router-link :to="'/producto/'+ item.id">
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
                                                                <v-icon
                                                                    >mdi-plus</v-icon
                                                                >
                                                            </v-btn>
                                                            </router-link>
                                                        </div>
                                                        <v-spacer></v-spacer>

                                                        <v-btn
                                                            icon
                                                            @click="
                                                                shows[
                                                                    index
                                                                ].show =
                                                                    !shows[
                                                                        index
                                                                    ].show
                                                            "
                                                        >
                                                            <v-icon
                                                                >{{
                                                                    shows[index]
                                                                        .show
                                                                        ? "mdi-chevron-up"
                                                                        : "mdi-chevron-down"
                                                                }}
                                                            </v-icon>
                                                        </v-btn>
                                                    </v-card-actions>
                                                    <v-expand-transition>
                                                        <div
                                                            v-show="
                                                                shows[index]
                                                                    .show
                                                            "
                                                        >
                                                            <v-list dense>
                                                                <v-divider></v-divider>
                                                                <v-list-item
                                                                    v-for="(
                                                                        key,
                                                                        index
                                                                    ) in filteredKeys"
                                                                    :key="index"
                                                                >
                                                                    <v-list-item-content
                                                                        :class="{
                                                                            'purple--text':
                                                                                sortBy ===
                                                                                key.text,
                                                                        }"
                                                                    >
                                                                        <p>
                                                                            {{
                                                                                key.text
                                                                            }}:
                                                                        </p>
                                                                    </v-list-item-content>

                                                                    <v-list-item-content
                                                                        class="align-end"
                                                                        :class="{
                                                                            'purple--text':
                                                                                sortBy ===
                                                                                key.value,
                                                                        }"
                                                                    >
                                                                        <template
                                                                            v-if="
                                                                                key.text ===
                                                                                'Tono'
                                                                            "
                                                                        >
                                                                            <v-chip
                                                                                :color=" item[key.value],"
                                                                            >
                                                                                {{
                                                                                    item[
                                                                                        key
                                                                                            .value
                                                                                    ]
                                                                                }}
                                                                            </v-chip>
                                                                        </template>
                                                                        <p
                                                                            v-else
                                                                        >
                                                                            {{
                                                                                item[
                                                                                    key.value.toLowerCase()
                                                                                ]
                                                                            }}
                                                                        </p>
                                                                    </v-list-item-content>
                                                                </v-list-item>
                                                            </v-list>
                                                        </div>
                                                    </v-expand-transition>

                                                    <v-divider
                                                        class="mx-4"
                                                    ></v-divider>
                                                </v-card>
                                            </v-col>
                                        </v-row>
                                    </template>

                                    <template v-slot:footer>
                                        <v-row
                                            class="mt-2 mb-4"
                                            align="center"
                                            justify="center"
                                        >
                                            <span class="grey--text"
                                                >Items per page</span
                                            >
                                            <v-menu offset-y>
                                                <template
                                                    v-slot:activator="{
                                                        on,
                                                        attrs,
                                                    }"
                                                >
                                                    <v-btn
                                                        dark
                                                        text
                                                        color="primary"
                                                        class="ml-2"
                                                        v-bind="attrs"
                                                        v-on="on"
                                                    >
                                                        {{ itemsPerPage }}
                                                        <v-icon
                                                            >mdi-chevron-down</v-icon
                                                        >
                                                    </v-btn>
                                                </template>
                                                <v-list>
                                                    <v-list-item
                                                        v-for="(
                                                            number, index
                                                        ) in itemsPerPageArray"
                                                        :key="index"
                                                        @click="
                                                            updateItemsPerPage(
                                                                number
                                                            )
                                                        "
                                                    >
                                                        <v-list-item-title>{{
                                                            number
                                                        }}</v-list-item-title>
                                                    </v-list-item>
                                                </v-list>
                                            </v-menu>

                                            <v-spacer></v-spacer>

                                            <span class="mr-4 grey--text">
                                                Pag {{ page }} de
                                                {{ numberOfPages }}
                                            </span>
                                            <v-btn
                                                fab
                                                dark
                                                color="amber darken-2"
                                                class="mr-1"
                                                @click="formerPage"
                                            >
                                                <v-icon
                                                    >mdi-chevron-left</v-icon
                                                >
                                            </v-btn>
                                            <v-btn
                                                fab
                                                dark
                                                color="amber darken-2"
                                                class="ml-1"
                                                @click="nextPage"
                                            >
                                                <v-icon
                                                    >mdi-chevron-right</v-icon
                                                >
                                            </v-btn>
                                        </v-row>
                                    </template>
                                </v-data-iterator>
                            </v-container>
                        </template>
                    </v-sheet>
                </v-col>

                <!-- <v-col cols="12" sm="2">
                    <v-sheet rounded="lg" min-height="268">

                    </v-sheet>
                </v-col> -->
            </v-row>
        </v-container>
    </v-main>
</template>

<script>
export default {
    data() {
        return {
            loading: false,
            selection: 1,
            itemsPerPageArray: [4, 8, 12],
            search: "",
            filter: {},
            sortDesc: false,
            page: 1,
            itemsPerPage: 4,
            sortBy: "nombre",
            shows: [],
            keys: [
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
            ],
            items: [],
        };
    },
    watch: {},

    computed: {
        numberOfPages() {
            return Math.ceil(this.items.length / this.itemsPerPage);
        },
        filteredKeys() {
            return this.keys.filter((key) => key !== "nombre");
        },
    },
    methods: {
        showcard(item) {
            console.log(item);
        },
        async listProductos() {

            try {
                 const respuesta = await axios.get(
                     "/api/producto"
                );
            this.items = respuesta.data;
            } catch (error) {
                 if(error.response.status !== 200){

                    console.log('estoy entrando en el if')
                    this.errors = error.response.data;
                    console.log(this.errors)
                    console.log(error.response.data.message)


                }else{
                     this.errors = error.response.data;
                    console.log(this.errors)
                    console.log(error.response.data.message)
                }
            }

            // for (let i = 0; i < this.items.length; i++) {
            //     // let newshow = {index: i, show:false};
            //     let newshow = { show: false };
            //     let load = (loading) => false;
            //     this.shows.push(newshow);

            //     // this.shows[i] = Object.assign(this.shows[i], newshow);
            //     // this.items[i] = Object.assign(this.items[i], load);
            //     console.log(this.items[i]);
            //     console.log(this.shows[i]);
            // }
        },
        resetshows() {
            let max = this.shows.length;
            this.shows.splice(0, max);
            for (let i = 0; i < max; i++) {
                let newshow = { show: false };
                this.shows.push(newshow);
            }
        },
        inspeccionarProducto(item) {
            console.log(item);
            // this.loading = true;
        },
        nextPage() {
            if (this.page + 1 <= this.numberOfPages) this.page += 1;
            this.resetshows();
        },
        formerPage() {
            if (this.page - 1 >= 1) this.page -= 1;
            this.resetshows();
            console.log(this.shows);
        },
        updateItemsPerPage(number = 4) {
            this.itemsPerPage = number;
            for (let i = 0; i < number; i++) {
                let newshow = { show: false };

                this.shows.push(newshow);
                console.log(this.shows[i]);
            }
        },
    },
    created() {
        this.listProductos();
        this.updateItemsPerPage();
    },
    mounted() {},
};
</script>

<style></style>
