<template>
    <v-main class="bg-fondo">
        <v-container>
            <v-row style="justify-content: center">
                <!-- <v-col cols="12" sm="2">
                    <v-sheet rounded="lg" min-height="268">

                    </v-sheet>
                </v-col> -->

                <v-col cols="12" sm="8">
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
                                                        color="amber darken-1

"
                                                        :value="false"
                                                    >
                                                        <v-icon
                                                            >mdi-arrow-up</v-icon
                                                        >
                                                    </v-btn>
                                                    <v-btn
                                                        large
                                                        depressed
                                                        color="amber darken-1

"
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
                                                v-for="item in props.items"
                                                :key="item.name"
                                                cols="12"
                                                sm="6"
                                                md="4"
                                                lg="3"
                                            >
                                                <v-card
                                                    :loading="loading"
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
                                                    <v-card-title
                                                        class="subheading font-weight-bold"
                                                    >
                                                        {{ item.nombre }}
                                                    </v-card-title>
                                                    <v-card-subtitle>
                                                        {{ item.tipo }}
                                                    </v-card-subtitle>

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
                                                    <v-card-actions>
                                                        <v-btn
                                                            color="deep-purple lighten-2"
                                                            text
                                                            @click="reserve"
                                                        >
                                                            Reserve
                                                        </v-btn>
                                                        <v-spacer></v-spacer>

                                                        <v-btn
                                                            icon
                                                            @click="
                                                                show = !show
                                                            "
                                                        >
                                                            <v-icon>{{
                                                                show
                                                                    ? "mdi-chevron-up"
                                                                    : "mdi-chevron-down"
                                                            }}</v-icon>
                                                        </v-btn>
                                                    </v-card-actions>
                                                    <v-divider
                                                        class="mx-4"
                                                    ></v-divider>

                                                    <v-expand-transition>
                                                        <div v-show="show">
                                                            <v-divider></v-divider>

                                                            <v-list dense>
                                                                <v-list-item
                                                                    v-for="(
                                                                        key,
                                                                        index
                                                                    ) in filteredKeys"
                                                                    :key="index"
                                                                >
                                                                    <v-list-item-content
                                                                        :class="{
                                                                            'blue--text':
                                                                                sortBy ===
                                                                                key.text,
                                                                        }"
                                                                    >
                                                                        {{
                                                                            key.text
                                                                        }}:
                                                                    </v-list-item-content>
                                                                    <v-list-item-content
                                                                        class="align-end"
                                                                        :class="{
                                                                            'blue--text':
                                                                                sortBy ===
                                                                                key.value,
                                                                        }"
                                                                    >
                                                                        {{
                                                                            item[
                                                                                key.value.toLowerCase()
                                                                            ]
                                                                        }}
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
                                            class="mt-2"
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
                                                Page {{ page }} of
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
             show: false,
            loading: false,
            selection: 1,
            itemsPerPageArray: [4, 8, 12],
            search: "",
            filter: {},
            sortDesc: false,
            page: 1,
            itemsPerPage: 4,
            sortBy: "name",
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

    computed: {
        numberOfPages() {
            return Math.ceil(this.items.length / this.itemsPerPage);
        },
        filteredKeys() {
            return this.keys.filter((key) => key !== "Name");
        },
    },
    methods: {
        async listProductos() {
            const respuesta = await axios.get(
                "http://127.0.0.1:8000/productos"
            );
            this.items = respuesta.data;
        },
        reserve() {
            this.loading = true;

            setTimeout(() => (this.loading = false), 2000);
        },
        nextPage() {
            if (this.page + 1 <= this.numberOfPages) this.page += 1;
        },
        formerPage() {
            if (this.page - 1 >= 1) this.page -= 1;
        },
        updateItemsPerPage(number) {
            this.itemsPerPage = number;
        },
    },
    mounted() {
        this.listProductos();
    },
};
</script>

<style></style>
