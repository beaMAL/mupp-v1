<template>
    <v-app id="inspire">
        <div>
            <div class="account-home-btn d-none d-sm-block">

            </div>
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
                                                <p class="text-muted">Login</p>
                                            </div>
                                            <div class="p-3">
                                                 <div
                                                    role="alert"
                                                    class="alert alert-warning text-center"
                                                    v-if="errors && errors.email"
                                                >
                                                    {{ errors.email[0] }}
                                                </div>

                                                <form  action class="form"  @submit.prevent="login">
                                                    <div class="form-group">

                                                        <label for="#email" class="form-label"
                                                            >Email</label
                                                        ><input
                                                            v-model="fields.email"
                                                            type="email"
                                                            id="email"
                                                            required
                                                            placeholder="Enter Email"
                                                            class="form-control form-input"
                                                        />
                                                        <label for="#password" class="form-label"
                                                            >Password</label
                                                        ><input
                                                            v-model="fields.password"
                                                            type="password"
                                                            id="password"
                                                            placeholder="Enter Password"
                                                            class="form-control form-input"
                                                        />
                                                    </div>
                                                    <div class="mt-3">
                                                        <v-btn
                                                        elevation="2"
                                                            type="submit"
                                                            class="form-submit btn  btn-block"
                                                            value="Login"
                                                            :disabled="submitting"
                                                            :loading="submitting"

                                                        >
                                                            Login
                                                        </v-btn>
                                                         <div
                                                        class="mt-4 mb-0 text-center"
                                                    >
                                                         <p class="msg">¿No tienes cuenta?
                                                          <router-link to="/registro" class="text-dark">Regístrate  <i
                                                                    class="mdi mdi-lock"
                                                                ></i
                                                                ></router-link>
                                                        </p>

                                                    </div>
                                                    </div>
                                                </form>
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
// axios.defaults.withCredentials = true;


    export default {
  data: () => ({

          fields: {
               'email': '',
            'password': '',
          },
          errors: {},
          submitting: false,


  }),
  methods: {
      submit(){
          this.submitting = true;

          axios.get('/sanctum/csrf-cookie').then(() => {
              axios.post("/login", this.fields)
                .then(response => {
                console.log(response)
                this.user= response.data.user;
                Swal.fire(
                         "Añadido!",
                            "Your file has been added.",
                            "success",


                )
                 //  this.$router.push('/')
                 this.submitting =false
                }).catch(error => {
                    if(error.response.status == 422){
                        console.log('estoy entrando en el if')
                        this.errors = error.response.data.errors
                        console.log(this.errors)
                        console.log(error.response)
                        this.submitting =false

                    }else{
                       console.log(error);
                         Swal.fire({
                                icon: "error",
                            title: "Oops...",
                            text: ` Algo fue mal... Petición fallida`,
                     } );
                        this.submitting =false
                    }
                });
          }).catch(error => {
             console.log('estoy 2')
          });
          //Deberia estar envuelto por un sweet alert


      },
        async login() {
            await this.$store.dispatch('login', this.fields)
             .then(response => {

                this.user= response.data.user;
                Swal.fire(
                         "Añadido!",
                            "Your file has been added.",
                            "success",


                )
                 //  this.$router.push('/')
                 this.submitting =false
                }).catch(error => {
                   // if(error.response.status == 422){
                   //     console.log('estoy entrando en el if')
                   //     this.errors = error.response.data.errors
                   //     console.log(this.errors)
                   //     console.log(error.response)
                   //     this.submitting =false
//
                   // }else{
                   //    console.log(error);
                   //      Swal.fire({
                   //             icon: "error",
                   //         title: "Oops...",
                   //         text: ` Algo fue mal... Petición fallida`,
                   //  } );
                   //     this.submitting =false
                   // }
                });
            return this.$router.replace('/perfil/')


        }
  },



}

</script>

<style lang="scss" scoped>

.error {
  margin: 1rem 0 0;
  color: #ff4a96;
}
.form-submit {
  background: #c2a1e2 !important;
  border: none;

  cursor: pointer;
  transition: background 0.2s;
  &:hover {
    background: #1cdaba !important;
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
