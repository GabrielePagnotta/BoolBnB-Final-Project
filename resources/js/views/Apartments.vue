<template>
  <div>
    <!-- <div class="d-flex justify-content-center">
              <span @click="showApartments(false)" class="tag">tutti</span>
              <div v-for="service in Service" :key="service.id" @click="showApartments()">
                  <div>
                      <div>

                          <span class="tag">{{ service['typeOfService'].toUpperCase() }}</span>
                      </div>
                  </div>
              </div>
          </div> -->

    <div
      class="d-flex m-auto justify-content-around"
      style="width: 60%; height: auto"
    >
      <input type="hidden" name="latitude" id="inputLat" />
      <input type="hidden" name="longitude" id="inputLong" />

      <!-- Searchbar Geo -->
      <div id="inputIndirizzo"></div>

      <div class="dropdown align-self-end">
        <a
          class="btn btn-secondary dropdown-toggle"
          href="#"
          role="button"
          data-toggle="dropdown"
          aria-expanded="false"
        >
          <i class="fa-solid fa-filter"></i>
        </a>

        <div class="dropdown-menu">
          <!--Stanze NUMERO 1-->
          <div class="d-flex justify-content-around">
            <p class="m-0">Stanze:</p>
            <i
              class="fa-solid fa-minus align-self-center"
              @click="decrease(1)"
            ></i>
            <div class="align-self-center">{{ this.stanze }}</div>
            <i
              class="fa-solid fa-plus align-self-center"
              @click="increment(1)"
            ></i>
          </div>
          <!--posti letto NUMERO 2-->
          <div class="d-flex justify-content-around">
            <p class="m-0">Posti letto:</p>
            <i
              class="fa-solid fa-minus align-self-center"
              @click="decrease(2)"
            ></i>
            <div class="align-self-center">{{ this.camereDaLetto }}</div>
            <i
              class="fa-solid fa-plus align-self-center"
              @click="increment(2)"
            ></i>
          </div>
          <!--distanza-->
          <div class="px-3">
            <p class="m-0">Distanza : {{ this.distanza }}</p>
            <input type="range" min="20" max="100" v-model="distanza" />
          </div>
          <button @click="researchApartment()" class="bFilter p-1 px-2">
            Applica
          </button>
        </div>

        <div class="my-dropdown-menu"></div>
      </div>
    </div>

    <!-- appartamenti -->
    <div class="d-flex justify-content-center flex-wrap m-4">
      <div v-if="this.soldatino == false" class="d-flex flex-wrap">
        <!-- Ciclo stampa appartamenti -->
        <div v-for="apartment in Apartments" :key="apartment.id" class="stampaCarta col-lg-2">
          <div v-if="apartment.visibility == 1">
            <!-- Redirect Show singolo appartamento -->
            <router-link class="text" :to="`/showed/${apartment.id}`">
              <!-- Carta -->
              <div
                id="card"
                class="card mx-3 border"
                style="max-width: 300px; height: 400px; border-radius: 20px"
              >
                <div
                  style="
                    width: 100%;
                    height: 300px;
                    object-fit: cover;
                    overflow: hidden;
                  "
                >
                  <!-- Controllo immagine non trovata -->
                  <img
                    v-if="apartment.cover == null"
                    class="w-100"
                    src="https://cdn.open2b.com/5jwg8ozdvx/var/products/218/07/0-ac06c2c2-416-fornitura-di-proiettore-di-immagini-oleografiche.jpg"
                    alt="fff"
                  />
                  <img
                    v-else
                    class="w-100"
                    style="border-radius: 10px"
                    :src="`/storage/${apartment.cover}`"
                    alt="apartment-image"
                  />
                </div>

                <div class="card-body">
                  <h5 class="card-title">{{ apartment["title"] }}</h5>
                  <!-- Dettagli -->
                  <div class="d-flex justify-content-center">
                    <div class="d-flex w-100 justify-content-around">
                      <div>
                        <i class="fa-solid fa-toilet px-2"></i>
                        <span>{{ apartment["bathrooms"] }}</span>
                      </div>

                      <div>
                        <i class="fa-solid fa-bed"></i>
                        <span>{{ apartment["bedrooms"] }}</span>
                      </div>
                    </div>
                    <div class="d-flex w-100 justify-content-around">
                      <div>
                        <i class="fa-solid fa-door-closed"></i>
                        <span>{{ apartment["rooms"] }}</span>
                      </div>

                      <div>
                        <i class="fa-solid fa-ruler-combined"></i>
                        <span>{{ apartment["square_meters"] }}</span>
                      </div>
                    </div>
                  </div>
                  <div>
                    <!-- Prezzo -->
                    <p class="text-center my-3">
                      <strong>Prezzo: </strong>{{ apartment["price"] }}€
                    </p>
                    <p class="text-center my-3">
                      <strong>Località: </strong>{{ apartment["address"] }}
                    </p>
                  </div>
                </div>
              </div>
            </router-link>
          </div>
        </div>
      </div>
      <div v-else class="d-flex">
        <div v-for="apartment in ApartmentsChecked" :key="apartment.id">
          <div v-if="apartment.visibility == 1">
            <!-- Redirect Show singolo appartamento -->
            <router-link class="text" :to="`/showed/${apartment.id}`">
              <!-- Carta -->
              <div
                id="card"
                class="card mx-3 border"
                style="max-width: 300px; height: 400px; border-radius: 20px"
              >
                <div
                  style="
                    width: 100%;
                    height: 300px;
                    object-fit: cover;
                    overflow: hidden;
                  "
                >
                  <!-- Controllo immagine non trovata -->
                  <img
                    v-if="apartment.cover == null"
                    class="w-100"
                    src="https://cdn.open2b.com/5jwg8ozdvx/var/products/218/07/0-ac06c2c2-416-fornitura-di-proiettore-di-immagini-oleografiche.jpg"
                    alt="fff"
                  />
                  <img
                    v-else
                    class="w-100"
                    style="border-radius: 10px"
                    :src="`/storage/${apartment.cover}`"
                    alt="apartment-image"
                  />
                </div>

                <div class="card-body">
                  <h5 class="card-title">{{ apartment["title"] }}</h5>
                  <!-- Dettagli -->
                  <div class="d-flex justify-content-center">
                    <div class="d-flex w-100 justify-content-around">
                      <div>
                        <i class="fa-solid fa-toilet px-2"></i>
                        <span>{{ apartment["bathrooms"] }}</span>
                      </div>

                      <div>
                        <i class="fa-solid fa-bed"></i>
                        <span>{{ apartment["bedrooms"] }}</span>
                      </div>
                    </div>
                    <div class="d-flex w-100 justify-content-around">
                      <div>
                        <i class="fa-solid fa-door-closed"></i>
                        <span>{{ apartment["rooms"] }}</span>
                      </div>

                      <div>
                        <i class="fa-solid fa-ruler-combined"></i>
                        <span>{{ apartment["square_meters"] }}</span>
                      </div>
                    </div>
                  </div>
                  <div>
                    <!-- Prezzo -->
                    <p class="text-center my-3">
                      <strong>Prezzo: </strong>{{ apartment["price"] }}€
                    </p>
                    <p class="text-center my-3">
                      <strong>Località: </strong>{{ apartment["address"] }}
                    </p>
                  </div>
                </div>
              </div>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

  <script>
// import axios from 'axios';

export default {
  name: "Apartments",
  components: {},
  data() {
    return {
      Apartments: [],
      ApartmentsChecked: [],
      coordinates: [],
      Service: [],
      Relation: [],
      soldatino: false,
      camereDaLetto: 0,
      stanze: 0,
      distanza: 20,


      options: {
        searchOptions: {
          key: "gfJDXxUVZKnn9kqVOkZ2tzc6DyGlkaWn",
          language: "en-GB",
          limit: 5,
        },
        autocompleteOptions: {
          key: "gfJDXxUVZKnn9kqVOkZ2tzc6DyGlkaWn",
          language: "en-GB",
        },
      },
    };
  },
  mounted() {
    this.getApartments();
    this.getServices();
    this.getRelation();

    var options = {
      searchOptions: {
        key: "gfJDXxUVZKnn9kqVOkZ2tzc6DyGlkaWn",
        language: "en-GB",
        limit: 5,
      },
      autocompleteOptions: {
        key: "gfJDXxUVZKnn9kqVOkZ2tzc6DyGlkaWn",
        language: "en-GB",
      },
    };

    var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
    var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
    // document.body.append(searchBoxHTML)
    // var inputLat = document.getElementById("lat");

    var inputElement = searchBoxHTML.querySelector("input"); // Selezione input della barra di ricerca
    inputElement.setAttribute("name", "address"); // Aggiunto l'attributo "name" con valore "address"
    inputElement.setAttribute("value", ""); // Aggiunto l'attributo "value" con valore "{{ old('indirizzo') }}"

    document.getElementById("inputIndirizzo").append(searchBoxHTML);

    // Selezione campi input
    var resultLat = document.getElementById("inputLat");
    var resultLong = document.getElementById("inputLong");

    // stampa latitudine e longitudine in un div che crea [funzione non puo avere this al suo interno]
    ttSearchBox.on("tomtom.searchbox.resultselected", (event) => {
      //svuoto gli array precedentemente riempiti
      this.coordinates = [];
      this.ApartmentsChecked = [];


      //attivo variabile soldatino
      this.soldatino = true;
      var result = event.data.result;
      var position = result.position;

      resultLat.value = `${position.lat}`;
      resultLong.value = `${position.lng}`;

      //salvo tutte le coordinate nel raggio minimo prestabilito di 20km
      this.Haversine(parseFloat(resultLat.value), parseFloat(resultLong.value));
      //verifico se in quel raggio esistano o meno degli appartamenti
      this.researchApartment();
    });
  },
  methods: {
    getApartments() {
      axios.get("http://127.0.0.1:8000/api/apartment").then((response) => {
        this.Apartments = response.data;
      });
    },
    getServices() {
      axios.get("http://127.0.0.1:8000/api/services").then((response) => {
        this.Service = response.data;
      });
    },
    getRelation() {
      axios.get("http://127.0.0.1:8000/api/aptservices").then((response) => {
        const data = response.data;
        data.forEach((elem) => {
          return (this.Relation = elem.services.pivot);
        });
      });
    },
    toRadians(degrees) {
      return (degrees * Math.PI) / 180;
    },
    getDistanceFromLatLng(lat1, lng1, lat2, lng2) {
      const earthRadius = 6371; // raggio terrestre in km
      const dLat = this.toRadians(lat2 - lat1);
      const dLng = this.toRadians(lng2 - lng1);
      const a =
        Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(this.toRadians(lat1)) *
          Math.cos(this.toRadians(lat2)) *
          Math.sin(dLng / 2) *
          Math.sin(dLng / 2);
      const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
      const distance = earthRadius * c; // distanza in km
      return distance;
    },
    Haversine(centerLat, centerLng) {
      // Ciclo per generare tutte le possibili coordinate nel raggio di 20 km
      console.log(typeof centerLat);
      for (let lat = centerLat - 0.2; lat <= centerLat + 0.2; lat += 0.001) {
        for (let lng = centerLng - 0.2; lng <= centerLng + 0.2; lng += 0.001) {
          const distance = this.getDistanceFromLatLng(
            centerLat,
            centerLng,
            lat,
            lng
          );
          if (distance <= this.distanza) {
            this.coordinates.push({
              lat: +lat.toFixed(3),
              lng: +lng.toFixed(3),
            });
          }
        }
      }
      console.log(this.coordinates);
    },
    decrease(fnumber) {
      console.log(fnumber);
      switch (fnumber) {
        case 1:
          if ((this.stanze == 0)) {
            this.stanze = 0;
          } else {
            this.stanze = this.stanze - 1;
          }
        case 2:
            console.log('mannaggia');
          if ((this.camereDaLetto == 0)) {
            this.camereDaLetto = 0;
          } else {
            this.camereDaLetto = this.camereDaLetto - 1;
          }
      }
    },
    increment(fnumber) {
      console.log(fnumber);
      switch (fnumber) {
        case 1:
          this.stanze = this.stanze + 1;
        case 2:
          this.camereDaLetto = this.camereDaLetto + 1;
      }
    },

    researchApartment() {
      this.ApartmentsChecked = [];
      for (let i = 0; i < this.Apartments.length; i++) {
        for (let j = 0; j < this.coordinates.length; j++) {
          if (
            this.Apartments[i].latitude == this.coordinates[j].lat &&
            this.Apartments[i].longitude == this.coordinates[j].lng
          ) {
            //this.ApartmentsChecked.push(this.Apartments[i]);
            if (this.Apartments[i].rooms >= this.stanze) {
              if (this.Apartments[i].bedrooms >= this.camereDaLetto) {
                console.log(this.Apartments[i].bedrooms);
                this.ApartmentsChecked.push(this.Apartments[i]);
              }
            }
          }
        }
      }
      console.log("controllo finito");
    },
  },
};
</script>


<style lang="scss" scoped>
.bFilter {
  color: white;
  background-color: black;
  border-radius: 10px;
  margin: auto;
  display: flex;
}

#inputIndirizzo {
  width: 50%;
}

#inputIndirizzo * {
  border-radius: 20px;
}
.tt-search-box {
  border-radius: 20px;
}
.tt-search-box-input-container {
  border-radius: 20px;
}
.card:hover {
  transform: scale(1.1);
}

.text {
  text-decoration: none;
  color: black;
}

.card {
  transition: transform 500ms;
}

.tag {
  font-size: 1.3rem;
  background-color: pink;
  border-radius: 10px;
  padding: 10px;
  margin: 1rem;
  color: white;
  cursor: pointer;
}

.tag:hover {
  background-color: crimson;
}

.stampaCarta {
    gap: 30px;
}
</style>
