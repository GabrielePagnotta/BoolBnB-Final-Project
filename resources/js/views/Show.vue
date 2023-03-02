<template>
    <div class="d-flex justify-content-center background">
      <div class="card mb-3 card">
        <img
          v-if="ShowApartment.cover == null"
          class="w-100"
          src="https://cdn.open2b.com/5jwg8ozdvx/var/products/218/07/0-ac06c2c2-416-fornitura-di-proiettore-di-immagini-oleografiche.jpg"
          alt="fff"
        />
        <img
          v-else
          class="w-100"
          style="border-radius: 10px"
          :src="`/storage/${ShowApartment.cover}`"
          alt="apartment-image"
        />
        <div class="card-body">
          <h2 class="card-title">{{ ShowApartment.title }}</h2>
          <hr class="mb-2" />

          <div class="status justify-content-around my-4">
            <div class="area">
              <p class="mx-2">
                <strong>metri quadri: </strong> {{ ShowApartment.square_meters }}
              </p>
              <hr />
              <p class="mx-2">
                <strong>Bagno/i: </strong> {{ ShowApartment.bathrooms }}
              </p>
              <hr />
              <p class="mx-2">
                <strong>Stanze/a: </strong> {{ ShowApartment.rooms }}
              </p>
              <hr />
              <p>Servizi: </p>
              <div class="p-3">

                <div class="d-flex flex-wrap gap-15 mb-4">
                    <!-- <li>{{ ShowService.services.ty }}</li> -->
                    <!-- <li v-for="elem in ShowService" :key="elem.id">{{ elem.address }}</li> -->
                  <span
                  class="badge badge-pill badge-primary p-2 personal-lightblue-gradient"
                  v-for="elem in ShowService.services" :key="elem.id"
                  >{{ elem.typeOfService }}</span>

                </div>



              </div>
              <div>
                <p class="mx-2 btn btn-primary">
                  <strong>Prezzo: </strong> {{ ShowApartment.price }}€
                </p>
              </div>
            </div>
            <div class="area">
                <!-- messaggio -->
              <form @submit.prevent="sendMessage">


                <div v-if="authUser == null">
                  <input
                    class="w-100 my-2"
                    type="email"
                    placeholder="inserisci email"
                    name="mail"
                    v-model="mail"
                  />
                </div>
                <div v-else>
                  <input
                    class="w-100 my-2"
                    type="email"
                    name="mail"
                    v-model="authUser.email"

                  />
                </div>

                <textarea
                  class="w-100"
                  name="message"
                  id=""
                  cols="30"
                  rows="10"
                  placeholder="scrivi del testo..."
                  v-model="message"
                ></textarea>
                <button class="btn btn-primary">Invia</button>
              </form>
            </div>
          </div>
          <hr />
          <h4>Descrizione:</h4>
          <div class="d-flex justify-content-center">
            <p class="card-text">{{ ShowApartment.description }}</p>
          </div>
          <!--Mappa-->
        <div id="map"></div>
        </div>

      </div>
    </div>

  </template>

  <script>
  import axios from "axios";

  export default {
    name: "Show",

    data() {
      return {
        ShowApartment: [],
        ShowService: [],
        messageValue:'',
        authUser: window.authUser,
        center: [4, 4.44],
      };
    },
    mounted() {
      this.getShowApartments();
      // console.log(this.ShowApartment);
      this.getShowService();

    //   console.log(this.center);
      const map = tt.map({
        key: "gfJDXxUVZKnn9kqVOkZ2tzc6DyGlkaWn",
        container: "map",
        center: this.center,
        zoom: 10
      })

      map.on('load', () => {
          new tt.Marker().setLngLat(this.center).addTo('map');
      })
    },

    methods: {
        getShowApartments() {
        axios
          .get(
            "http://127.0.0.1:8000/api/apartment/showed/" + this.$route.params.id
          )
          .then((response) => {
            // console.log(this.$route.params.id);
            this.ShowApartment = response.data;
            //this.center = [response.data.latitude, response.data.longitude];
          });
        },
        getShowService() {
            axios
            .get(
                "http://127.0.0.1:8000/api/aptservices/" + this.$route.params.id
            )
            .then((response) => {
                this.ShowService = response.data;
                //this.center = [response.data.latitude, response.data.longitude];
                console.log('Gab <3: ', this.ShowService);
                this.ShowService.forEach(elem => {
                    console.log(elem.typeOfService)
                });

            });

        },

        sendMessage(){
            axios.post('/api/messages', {mail: this.authUser.email, message: this.message, apartmentId: this.$route.params.id })
        }


    },

    }


  </script>



  <style lang="scss" scoped>
  .status {
    display: flex;
  }

  .background {
    background-image: url(../assets/pattern.jpg);
  }

  .card {
    width: 50%;
  }

  .area {
    width: 50%;
  }

  @media screen and (max-width: 900px) {
    .card {
      width: 80%;
    }

    .status {
      display: block;
    }

    .area {
      width: 80%;
      margin: auto;
    }
  }

  .gap-15 {
    gap: 15px;
  }
  .personal-lightblue-gradient {
    background: linear-gradient(to top, #67b0ff, #007bff 30%);
  }
  </style>



