<template>
    <div class="d-flex justify-content-center">


            <div class="card mb-3">
                <img v-if="ShowApartment.cover == null" class="w-100"
                src="https://cdn.open2b.com/5jwg8ozdvx/var/products/218/07/0-ac06c2c2-416-fornitura-di-proiettore-di-immagini-oleografiche.jpg"
                alt="fff">
                <img v-else class="w-100" style="border-radius: 10px;" :src="`/storage/${ShowApartment.cover}`" alt="apartment-image">
                <div class="card-body">
                    <h5 class="card-title">{{ ShowApartment.title }}</h5>
                    <p class="card-text">{{ShowApartment.description}}</p>
                    <div class="d-flex justify-content-around">

                            <p> <strong>bagni:</strong>  {{ ShowApartment.bathrooms }}</p>
                            <p><strong>Camere:</strong> {{ ShowApartment.rooms }}</p>




                            <p><strong>indirizzo:</strong> {{ ShowApartment.address }}</p>
                            <p><strong>metri quadri:</strong> {{ ShowApartment.square_meters }}</p>



                            <p><strong>prezzo:</strong> {{ ShowApartment.price }}€</p>
                    </div>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>




    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'Show',
    data() {
        return {
            ShowApartment: []
        }
    },
    mounted() {


        this.getShowApartments();
    },

    methods: {
        getShowApartments() {

            axios.get("http://127.0.0.1:8000/api/apartment/showed/" + this.$route.params.id )
                .then((response) => {
                    console.log(this.$route.params.id)
                    this.ShowApartment = response.data;


                })

        }
    }
}
</script>

<style lang="scss" scoped></style>


