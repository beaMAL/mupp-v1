<template>
    <v-app>
        <v-data-table
            :headers="headers"
            :items="items"
            :page.sync="page"
            :items-per-page="itemsPerPage"
            sort-by="nombre"
            hide-default-footer
            class="elevation-1"
            @page-count="pageCount = $event"
        >
            <template v-slot:[`item.actions`]="{ item }">
                <v-icon small class="mr-2" @click=""> mdi-pencil </v-icon>
                <v-btn color="red" @click="deleteItemSweet(item.id)">
                    <v-icon small color="white"> mdi-window-close </v-icon>
                </v-btn>
            </template>
            <template v-slot:no-data>
                <v-btn color="primary" @click="listProductos()"> Reset </v-btn>
            </template>
        </v-data-table>
        <div class="text-center pt-2">
            <v-pagination v-model="page" :length="pageCount"></v-pagination>
        </div>
    </v-app>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

export default {
    data: () => ({
        page: 1,
        pageCount: 0,
        itemsPerPage: 8,
        dialogDelete: false,
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
        items: [],
    }),
    methods: {
        async listProductos() {
            const respuesta = await axios.get("/api/listar-favoritos");
            this.items = respuesta.data;
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
                                "/api/producto/" + item.id
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
    },
    created() {
        this.listProductos();
    },
    // mounted() {
    //     this.listProductos();
    // },
};
</script>

<style lang="scss" scoped>
.error {
    margin: 1rem 0 0;
    color: #ff4a96;
}

.form-submit {
    background: #c2a1e2;
    border: none;

    cursor: pointer;
    transition: background 0.2s;

    &:hover {
        background: #1cdaba;
    }
}

.form-input {
    border: 1px solid white;

    &:focus {
        outline: 0;
        border-color: #c2a1e2;
    }
}

.form-label {
    &:first-of-type {
        margin-top: 0rem;
    }
}

.bg-account-pages {
    background: linear-gradient(to right, #512da8, #711e72);
    opacity: 0.9;
}
</style>
