<template>
    <div>
        <!-- Navigation-->
        <Navbar></Navbar>

        <!-- <transition> -->
        <router-view></router-view>
        <!-- </transition> -->

        <!-- Footer-->
        <TheFooter></TheFooter>
    </div>
</template>

<script>
import Navbar from "./components/Navbar.vue";
import TheFooter from "./components/TheFooter.vue";
export default {
    name: "App",
    components: { Navbar, TheFooter },
    data() {
        return {
            
        };
    },
};
</script>
