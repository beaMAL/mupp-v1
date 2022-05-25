<template>
    <div class="container">
        <button
            @click="
                update = false;
                openModal();
            "
            type="button"
            class="btn btn-primary"
            data-bs-target="#staticBackdrop"
        >
            Añadir Producto
        </button>

        <!-- Modal -->
        <div
            class="modal fade"
            :class="{ show: modal, bgpurple: modal }"
            id="staticBackdrop"
            data-bs-backdrop="static"
            tabindex="-1"
            aria-labelledby="staticBackdropLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                            {{ titleModal }}
                        </h5>
                        <button
                            @click="closeModal()"
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <div class="mb-3 row">
                                <label for="inputMarca" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                     <input type="text" class="form-control" id="uname" placeholder="Introduce nombre del producto" name="uname" required>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-lg input-group mb-3">
                                    <label class="input-group-text" for="inputGroupSelect01">Categoría</label>
                                    <select class="form-select" required id="inputGroupSelect01">
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                    <div class="invalid-feedback">Example invalid select feedback</div>
                                </div>
                                <div class="col ">
                                    <div class="mb-3 row">
                                        <label for="inputMarca" class="col-sm-2 col-form-label">Marca</label>
                                        <div class="col-sm-10">
                                             <input type="text" class="form-control" id="uname" placeholder="Introduce nombre del producto" name="uname" required>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Please fill out this field.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col mt-3">
                                    <div class="form-floating mb-3">
                                       <textarea class="form-control" required placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                        <label for="floatingTextarea2">Descripción</label>
                                    </div>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                            </div>
                            <!-- <div class="row"></div> -->
                            <div class="row">
                                <div class="col offset-lg-3 input-group">
                                   <label class="input-group-text" for="inputGroupSelect01">Familia Color</label>
                                    <select class="form-select" id="inputGroupSelect01">
                                        <option value="">Familia color</option>
                                        <option value="1">Azules</option>
                                        <option value="2">Verdes</option>
                                        <option value="3">Amarillos</option>
                                        <option value="4">Naranjas</option>
                                        <option value="5">Rojos</option>
                                        <option value="6">Violetas</option>
                                        <option value="7">Rosas</option>
                                        <option value="8">Nude</option>
                                        <option value="9">Nude</option>

                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row d-flex justify-content-sm-around">
                                        <div class="col-sm-4">
                                            <label for="exampleColorInput" class=" col-form-label ">Color picker </label>
                                        </div>
                                        <div class="col-sm-3 ">
                                           <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#563d7c" title="Elige un color">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-md-5">...</div>
                                        <div class="col-md-7">...</div>
                                    </div>
                                </div>
                            <div class="col-sm-4">...</div>
                        </div>

                        </form>
                     </div>
                    <div class="modal-footer">
                        <button
                            @click="closeModal()"
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Cerrar
                        </button>
                        <button type="button" class="btn btn-success">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Tono</th>
                    <th scope="col" colspan="2" class="text-center">Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="producto in productos" :key="producto.id">
                    <th scope="row">{{ producto.id }}</th>
                    <td>{{ producto.nombre }}</td>
                    <td>{{ producto.marca }}</td>
                    <td>{{ producto.categoria }}</td>
                    <td>{{ producto.tono }}</td>
                    <td>
                        <button
                            @click="
                                update = true;
                                openModal(producto.id);
                            "
                            class="btn btn-warning"
                        >
                            Editar
                        </button>
                    </td>
                    <td>
                        <button
                            @click="eliminar(producto.id)"
                            class="btn btn-danger"
                        >
                            Eliminar
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            update: true,
            modal: 0,
            titleModal: "",
            productos: [],
        };
    },
    methods: {
        async listProductos() {
            const respuesta = await axios.get("http://127.0.0.1:8000/productos");
            this.productos = respuesta.data;
        },
        async eliminar(id) {
            const respuesta = await axios.delete("http://127.0.0.1:8000/productos/" + id);
            this.listProductos();
        },
        openModal(id = 0) {
            this.modal = 1;
            if (this.update) {
                this.titleModal = "Modificar Producto";
            } else {
                this.titleModal = "Nuevo Producto";
            }
        },
        closeModal() {
            this.modal = 0;
        },
    },
    created() {
        this.listProductos();
    },
};
</script>
<style>
.show {
    display: list-item;
}
.bgpurple{
opacity: 1;
    background-color: rgba(44, 38, 75, 0.849);
}

</style>
