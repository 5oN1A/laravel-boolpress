<template>
    <div class="container">
        <h1>{{ welcomeMsg }}</h1>
    </div>
</template>

<script>
    export default {
        name: "App",
        data() {
            return {
                welcomeMsg: "Welcome!"
            }
        }
    }
</script>
