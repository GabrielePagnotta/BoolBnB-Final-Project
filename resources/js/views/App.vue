<template>
    <div>
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
    },

    data() {
        return {
            Apartments: []
        };
    },
    mounted() {


        this.getApartments();
    },

    methods:{
        getApartments(){

            axios.get('http://127.0.0.1:8000/api/apartment')
            .then( (response) => {

             this.Apartments = response.data;
             console.log(response.data)

            })

        }
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
