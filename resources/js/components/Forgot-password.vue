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
                                            <div class="text-center mt-3">
                                                <h3 class="font-weight-bold">
                                                    <a
                                                        href="/"
                                                        class="text-dark text-uppercase account-pages-logo"
                                                        >MUPP</a
                                                    >
                                                </h3>
                                                <p class="text-muted">
                                                    Reset Password
                                                </p>
                                            </div>
                                            <div class="p-3">
                                                <div
                                                    role="alert"
                                                    class="alert alert-warning text-center"
                                                >
                                                    Enter your email address and
                                                    we'll send you an email with
                                                    instructions to reset your
                                                    password.
                                                </div>
                                                <form>
                                                    <div class="form-group">
                                                        <label for="email"
                                                            >Email</label
                                                        ><input
                                                            type="password"
                                                            id="email"
                                                            placeholder="Enter Email"
                                                            class="form-control"
                                                        />
                                                    </div>
                                                    <div class="mt-3">
                                                        <button
                                                            type="submit"
                                                            class="btn btn-custom btn-block"
                                                        >
                                                            Reset your Password
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
<style>
.bg-account-pages {
    background: linear-gradient(to right, #512da8, #711e72);
    opacity: 0.9;
}
</style>
