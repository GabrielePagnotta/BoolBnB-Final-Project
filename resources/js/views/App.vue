<template>
    <div>
        <Navbar />
        <!-- <Apartments :info="Apartments"/> -->
        <router-view :info="Apartments"></router-view>
    </div>
</template>

<script>
    import Navbar from '../components/Navbar.vue'
    // import Apartments from '../views/Apartments.vue'

    export default {
    name: "app",
    components:{
        Navbar,
    }

}
</script>

<style lang="scss" scoped>
    *{
        margin: 0;
        padding:0;
        box-sizing: border-box;
    }
</style>
