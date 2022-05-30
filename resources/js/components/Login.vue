<template>
    <v-app id="inspire">
        <div>
            <div class="account-home-btn d-none d-sm-block">
                <a href="/" class="text-white"
                    ><i class="mdi mdi-home h1"></i
                ></a>
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
                                                <form action class="form">
                                                    <div class="form-group">
                                                        <label for="#email" class="form-label"
                                                            >Email</label
                                                        ><input
                                                            type="email"
                                                            id="email"
                                                            required
                                                            placeholder="Enter Email"
                                                            class="form-control form-input"
                                                        />
                                                        <label for="#password" class="form-label"
                                                            >Password</label
                                                        ><input
                                                            type="password"
                                                            id="password"
                                                            placeholder="Enter Password"
                                                            class="form-control form-input"
                                                        />
                                                    </div>
                                                    <div class="mt-3">
                                                        <button
                                                            type="submit"
                                                            class="form-submit btn  btn-block"
                                                            value="Login"
                                                        >
                                                            Login
                                                        </button>
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

<script></script>
<style lang="scss" scoped>
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
