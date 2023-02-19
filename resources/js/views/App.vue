<template>
    <div>

    </div>
</template>

<script>
    export default {
    name: "app",

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

</style>
