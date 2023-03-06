<template>
    <div class="personal-bg-lightpink">
        <Navbar />
        <router-view></router-view>
        <Footer />
    </div>
</template>

<script>
    import Navbar from '../components/Navbar.vue'
    import Footer from '../components/Footer.vue'

    export default {
    name: "app",
    components:{
        Navbar,Footer
    }

}
</script>

<style lang="scss" scoped>
    *{
        margin: 0;
        padding:0;
        box-sizing: border-box;

    }
    // .height-100{
    //     height: 100vh;
    //     overflow-y: scroll;
    // }

    .personal-bg-lightpink {
    background-color: white;
}
</style>
