<template>
    <v-app id="inspire">
        <div>
            <div class="account-home-btn d-none d-sm-block"></div>
            <section class="bg-account-pages height-100vh">
                <div class="display-table">
                    <div class="display-table-cell">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-5">
                                    <div class="card account-card">
                                        <div class="card-body">
                                            <div
                                                class="justify-content-center text-center mt-3"
                                            >
                                                <h3 class="font-weight-bold">
                                                    <a
                                                        href="/"
                                                        class="text-dark text-uppercase account-pages-logo justify-center"
                                                    >
                                                        <div
                                                            class="w-100 justify-content-center"
                                                        >
                                                            <img
                                                                alt="logo"
                                                                width="200"
                                                                height="200"
                                                                position="center center"
                                                                src="http://127.0.0.1:8887/images/mupp-psd-estilizado4-sintexto.png"
                                                            />
                                                        </div>
                                                        <p
                                                            style="
                                                                font-family: Roboto,
                                                                    Helvetica,
                                                                    Arial,
                                                                    sans-serif;
                                                                font-size: 32px;
                                                            "
                                                            class="font-weight-medium"
                                                        >
                                                            <span
                                                                class="font-weight-thin"
                                                                >M</span
                                                            >UPP
                                                        </p>
                                                    </a>
                                                </h3>
                                                <!-- <p class="text-muted">Login</p> -->
                                            </div>
                                            <div class="p-3">
                                                <div class="mt-3 text-center">
                                                    <h1 class="title">
                                                        Not Found
                                                    </h1>
                                                    <p>
                                                        Woops! Parece que la página que buscas no ha sido encontrada.
                                                    </p>

                                                    <div
                                                        class="mt-4 mb-0 text-center"
                                                    >
                                                        <p class="msg">
                                                            ¿No tienes cuenta?
                                                            <router-link
                                                                to="/registro"
                                                                class="text-dark"
                                                                >Regístrate
                                                                <i
                                                                    class="mdi mdi-lock"
                                                                ></i
                                                            ></router-link>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </v-app>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

const ENDPOINT_PATH = "http://127.0.0.1:8000/api/";
export default {
    data: () => ({
        email: "",
        password: "",
        error: false,
    }),
    methods: {
        async register(email, password) {
            const user = { email, password };
            try {
                let resultado = axios.post(ENDPOINT_PATH + "user", user);
                console.log(response);
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
                console.log(e);
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: `Peticion fallida: ${e}`,
                });
            }
        },
        login() {
            console.log(this.email);
            console.log(this.password);
        },
    },
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
