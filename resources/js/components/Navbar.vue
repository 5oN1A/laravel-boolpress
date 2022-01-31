<template>
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <router-link class="navbar-brand router-link-active" to="/">
             Laravel-Blog
            </router-link>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">

                    <li class="nav-item">
                        <router-link
                            class="nav-link px-lg-3 py-3 py-lg-4 router-link-active"
                            to="/"
                            >Home</router-link
                        >
                    </li>
                   

                    <li class="nav-item">
                        <router-link
                            class="nav-link px-lg-3 py-3 py-lg-4 router-link-active"
                            :to="{ name: 'contact' }"
                            >Contatti</router-link
                        >
                    </li>

                    <li class="nav-item">
                        <router-link
                            class="nav-link px-lg-3 py-3 py-lg-4 router-link-active"
                            to="/about"
                            >Chi siamo</router-link
                        >
                    </li>

                    <li class="nav-item">
                        <a class="nav-link px-lg-3 py-3 py-lg-4" href="/login">
                            {{ user.name ? user.name : "Login" }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            user: {
                type: null,
             
            },
        };
    },
    mounted() {
        window.axios.get("/api/user").then((resp) => {
            this.user = resp.data;
        });
    },
};
</script>

<style lang="scss">
nav .router-link-exact-active {
    color : red !important;
}
</style>