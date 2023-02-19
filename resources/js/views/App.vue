<template>
    <div>

    </div>
</template>

<script>
    export default {
        name:'App',

    },
    data() {
        return{
            data:[],
        };

    },
    mounted(){
        getapartment()
    },
    methods:{
        getapartment(){

            axios.get('https://localhost:8000/api/apartment')
            .then( (response) => {
             console.log( response.data );
             this.data = response.data
            })
        }
    }
</script>

<style lang="scss" scoped>

</style>
