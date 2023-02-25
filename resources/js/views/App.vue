<template>
    <div class="height-100 personal-gb-lightpink">
        <Navbar />
        <!-- <Apartments :info="Apartments"/> -->
        <router-view></router-view>
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
    .height-100{
        height: 100vh;
    }

    .personal-gb-lightpink {
    background-image: linear-gradient(to bottom, #ffd2dc 20% , #fff0f3);
}
</style>
