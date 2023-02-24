<template>
    <div class="d-flex justify-content-center background">


            <div class="card mb-3 card ">
                <img v-if="ShowApartment.cover == null" class="w-100 "
                src="https://cdn.open2b.com/5jwg8ozdvx/var/products/218/07/0-ac06c2c2-416-fornitura-di-proiettore-di-immagini-oleografiche.jpg"
                alt="fff">
                <img v-else class="w-100" style="border-radius: 10px;" :src="`/storage/${ShowApartment.cover}`" alt="apartment-image">
                <div class="card-body">
                    <h2 class="card-title">{{ ShowApartment.title }}</h2>
                    <hr class="mb-2" >

                    <div class="status justify-content-around my-4">
                        <div class="area">
                            <p class="mx-2"><strong>metri quadri: </strong> {{ShowApartment.square_meters}}</p>
                            <hr>
                            <p class="mx-2"><strong>Bagno/i:  </strong> {{ShowApartment.bathrooms}}</p>
                            <hr>
                            <p class="mx-2"><strong>Stanze/a: </strong> {{ShowApartment.rooms}}</p>
                            <hr>
                            <div>

                                <p class="mx-2 btn btn-primary"><strong>Prezzo: </strong> {{ShowApartment.price}}€</p>
                            </div>

                        </div>
                        <div class="area">

                            <form action="" method="POST">
                                <div v-if="authUser == null">
                                    <input class="w-100 my-2" type="email" placeholder="inserisci email">
                                </div>
                                <div v-else>
                                    <input class="w-100 my-2" type="email" :value=" authUser.email ">
                                </div>


                                <textarea class="w-100" name="" id="" cols="30" rows="10" placeholder="scrivi del testo..."></textarea>
                                <button class="btn btn-primary">Invia</button>

                            </form>
                        </div>
                    </div>
                    <hr>
                    <h4>
                        Descrizione:
                    </h4>
                    <div class="d-flex justify-content-center">
                        <p class="card-text">{{ShowApartment.description}}</p>
                    </div>
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
            ShowApartment: [],
            authUser:window.authUser,
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

<style lang="scss" scoped>

.status{
    display: flex;
}

.background{

    background-image: url(../assets/pattern.jpg);
}

.card{
    width: 50%;
}

.area{
    width: 50%;
}

@media screen and (max-width: 900px) {
  .card{
    width: 80%;
  }

  .status{
    display: block;
  }

  .area{
    width: 80%;
    margin: auto;
  }
}
</style>


