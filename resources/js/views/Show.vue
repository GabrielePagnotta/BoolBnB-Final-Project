<template>
    <div class="d-flex justify-content-center background pt-4 personal-bg-lightpink-reverse">
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
            <div class="d-flex justify-content-between align-items-center mx-3">

                <h2 class="card-title">{{ ShowApartment.title }}</h2>

                <div>
                    <p class="mx-2 btn" style="background-color: rgb(232, 76, 105);color: white">
                        <strong>Prezzo: </strong> {{ ShowApartment.price }}€
                    </p>
                </div>
            </div>
          <hr>
          <h4 class="mx-3 my-3">Descrizione</h4>
          <div class="d-flex mx-4 ">

              <p>{{ ShowApartment.description }}</p>
          </div>

          <hr>
        <div class="status justify-content-around">
            <div class="area">
                <h4 class="mx-3 my-3">Informazioni:</h4>
                <div class="my-4 mx-3">

                    <p class="mx-2">
                      <strong>metri quadri: </strong> {{ ShowApartment.square_meters }}
                    </p>

                    <p class="mx-2">
                      <strong>Bagno/i: </strong> {{ ShowApartment.bathrooms }}
                    </p>

                    <p class="mx-2">
                      <strong>Stanza/e: </strong> {{ ShowApartment.rooms }}
                    </p>
                </div>
                <hr>
              <h4 class="mt-5 mx-3">Servizi:</h4>
              <div>

                <div class="d-flex justify-content-center flex-wrap gap-15 mb-4">
                  <span
                  class="badge badge-pill p-2 mt-3" v-for="elem in ShowService.services" :key="elem.id" style="background-color: rgb(232, 76, 105);color: white">{{ elem.typeOfService }}</span>

                </div>



              </div>

            </div>
            <div class="area" style="margin-top: 20px;">
                    <!-- messaggio -->
                    <h4 class="title-contact title-center">Contatti:</h4>
                <form @submit.prevent="sendMessage" class="title-center">
                    <div v-if="authUser == null">
                    <input
                        class="w-100 my-2 border-personal"
                        type="email"
                        placeholder="inserisci email"
                        name="mail"
                        v-model="userEmail"
                        required
                    />
                    </div>
                    <div v-else>
                    <input
                        class="border-personal w-100 my-2"
                        type="email"
                        name="mail"
                        v-model="authUser.email"
                    />
                    </div>

                    <textarea
                    class="w-100 border-personal"
                    name="message"
                    id=""
                    cols="30"
                    rows="10"
                    placeholder="scrivi del testo..."
                    v-model="message"
                    ></textarea>

                    <button @click="showAlert = true" class="btn" style="background-color: rgb(232, 76, 105);color: white; margin-top: 10px;" >Invia</button>
                </form>
                <transition name="fade">
                    <div class="alert alert-success mt-3" role="alert" v-if="showSuccessAlert">
                        Messaggio inviato con successo!
                    </div>
                </transition>
            </div>
          </div>


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
        message:'',
        authUser: window.authUser,
        userEmail: '',
        center: [4, 4.44],
        // dati per pop up invio messaggio
        messageSent: false,
        showSuccessAlert: false
      };
    },
    mounted() {
      this.getShowApartments();
      // console.log(this.ShowApartment);
      this.getShowService();

    },

    methods: {
        getShowApartments() {
        axios
          .get(
            "http://127.0.0.1:8000/api/apartment/showed/" + this.$route.params.id
          )
          .then((response) => {
            this.ShowApartment = response.data;
          });
        },
        getShowService() {
            axios
            .get(
                "http://127.0.0.1:8000/api/aptservices/" + this.$route.params.id
            )
            .then((response) => {
                this.ShowService = response.data;
            });

        },

        sendMessage(){
            if(this.authUser) {
                this.userEmail = this.authUser.email;
            }
            axios.post('/api/messages', {
                email: this.userEmail,
                message: this.message,
                apartmentId: this.$route.params.id
            })
            .then((response) => {
                console.log(response.data);
                this.message = '';
                // Switch variabile soldatino
                this.messageSent = true;
                this.showSuccessAlert = true;

                setTimeout(() => {this.showSuccessAlert = false;}, 3000);
            });
        }


    },

    }


  </script>



  <style lang="scss" scoped>

  .title-contact{
    margin-top: -5px;
  }

  .background{
    background-color: white;
  }

  .card-body{
    background-color: #ffe9ed;
  }

  .border-personal{
    border-radius: 15px;
    border-color: lightgray;
  }


  .status {
    display: flex;
    flex-direction: row;
  }

  .card {
    width: 50%;
  }

  .area {
    width: 50%;
  }

  @media screen and (max-width: 768px) {
    .card {
      width: 100%;
    }

    .area {
      width: 100%;
      margin: auto;
    }

    .title-contact{
      margin-top: 0;
    }
  }

  .gap-15 {
    gap: 15px;
  }
  .personal-lightblue-gradient {
    background: linear-gradient(to top, #67b0ff, #007bff 30%);
  }

  .personal-bg-lightpink-reverse {
    background-image: linear-gradient(to top, #ffd2dc 20%, #fff0f3);
}

  .fade-enter-active, .fade-leave-active {
  transition: opacity 0.5s;
}

.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}

.bg-lightpink-gradient {
            background: white;
        }

@media screen and (max-width: 425px) {
    .card-title{
    font-size: 20px;
    }
}

@media screen and (min-width: 425px) {
    .card-title{
        font-size: 22px;
    }
}

@media screen and (max-width: 768px) {
    .status{
        flex-direction: column;
    }

    .title-center{
        text-align: center;
    }

}
  </style>



