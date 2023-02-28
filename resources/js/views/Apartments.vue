<template>
    <div class="personal-bg-lightpink-reverse height-93">
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

        <div class="d-flex m-auto justify-content-center align-items-center" style="width: 60%; height: auto">
            <input type="hidden" name="latitude" id="inputLat" />
            <input type="hidden" name="longitude" id="inputLong" />

            <!-- Searchbar Geo -->
            <div id="inputIndirizzo" class="my-5"></div>

            <div class="dropdown d-flex" style="margin-left: 20px">
                <a class="btn btn-secondary dropdown-toggle align-self-center" style="margin-top: 10px" href="#"
                    role="button" aria-expanded="false" @click="showSerarch()">
                    <i class="fa-solid fa-filter"></i>
                </a>

                <div class="position-relative" id="searchContainer"></div>
                <!--Stanze NUMERO 1-->

                <div class="search" id="hello">
                    <div class="d-flex justify-content-around">
                        <p class="m-0">Stanze:</p>
                        <i class="fa-solid fa-minus align-self-center" @click="decrease1(1)"></i>
                        <div class="align-self-center" min="1">{{ this.stanze }}</div>
                        <i class="fa-solid fa-plus align-self-center" @click="increment1(1)"></i>
                    </div>
                    <!--posti letto NUMERO 2-->
                    <div class="d-flex justify-content-around">
                        <p class="m-0">Posti letto:</p>
                        <i class="fa-solid fa-minus align-self-center" @click="decrease2(2)"></i>
                        <div class="align-self-center">{{ this.camereDaLetto }}</div>
                        <i class="fa-solid fa-plus align-self-center" @click="increment2(2)"></i>
                    </div>
                    <!--servizi-->
                    <div>
                        <p>Servizi:</p>
                        <div v-for="elem in Service" :key="elem.id">
                            <label>
                                <input type="checkbox" :value="elem.id" v-model="services2" @click="updateServices" />
                                <span>{{ elem.typeOfService }}</span>
                            </label>
                        </div>
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
        <div class="d-flex flex-wrap">
            <div v-if="this.soldatino == false" class="d-flex justify-content-center flex-wrap">
                <!-- Ciclo stampa appartamenti -->
                <div v-for="apartment in Apartments" :key="apartment.id" class="stampaCarta">
                    <div v-if="apartment.visibility == 1">
                        <!-- Redirect Show singolo appartamento -->
                        <router-link class="text" :to="`/showed/${apartment.id}`">
                            <!-- Carta -->
                            <div id="card" class="card m-3 border"
                                style="max-width: 300px; height: 400px; border-radius: 20px">
                                <div style="
                                                    width: 100%;
                                                    height: 300px;
                                                    object-fit: cover;
                                                    overflow: hidden;
                                                  ">
                                    <!-- Controllo immagine non trovata -->
                                    <img v-if="apartment.cover == null" style="border-radius: 20px" class="w-100"
                                        src="https://cdn.open2b.com/5jwg8ozdvx/var/products/218/07/0-ac06c2c2-416-fornitura-di-proiettore-di-immagini-oleografiche.jpg"
                                        alt="fff" />
                                    <img v-else class="w-100" style="border-radius: 20px"
                                        :src="`/storage/${apartment.cover}`" alt="apartment-image" />
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
                            <div id="card" class="card mx-3 border"
                                style="max-width: 300px; height: 400px; border-radius: 20px">
                                <div style="
                                                    width: 100%;
                                                    height: 300px;
                                                    object-fit: cover;
                                                    overflow: hidden;
                                                  ">
                                    <!-- Controllo immagine non trovata -->
                                    <img v-if="apartment.cover == null" class="w-100"
                                        src="https://cdn.open2b.com/5jwg8ozdvx/var/products/218/07/0-ac06c2c2-416-fornitura-di-proiettore-di-immagini-oleografiche.jpg"
                                        alt="fff" />
                                    <img v-else class="w-100" style="border-radius: 10px"
                                        :src="`/storage/${apartment.cover}`" alt="apartment-image" />
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
            services2: [],
            soldatino: false,
            camereDaLetto: 0,
            stanze: 0,
            distanza: 20,
            Lat: 0,
            Lng: 0,

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
        this.getServices();
        this.getRelation();
        this.getPivot();

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

            this.Lat = parseFloat(resultLat.value);
            this.Lng = parseFloat(resultLong.value);

            //salvo tutte le coordinate nel raggio minimo prestabilito di 20km
            //this.Haversine(parseFloat(resultLat.value), parseFloat(resultLong.value));
            //verifico se in quel raggio esistano o meno degli appartamenti
            this.researchApartment();
        });
    },
    methods: {
        getPivot() {
            axios.get('http://127.0.0.1:8000/api/pivot').then((response) => {
                this.Apartments = response.data;
            })
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
            this.coordinates = [];
            // Ciclo per generare tutte le possibili coordinate nel raggio di 20 km
            for (let lat = centerLat - 0.2; lat <= centerLat + 0.2; lat += 0.001) {
                for (let lng = centerLng - 0.2; lng <= centerLng + 0.2; lng += 0.001) {
                    const distance = this.getDistanceFromLatLng(
                        centerLat,
                        centerLng,
                        lat,
                        lng
                    );

                    if (distance <= parseInt(this.distanza)) {
                        this.coordinates.push({
                            lat: +lat.toFixed(3),
                            lng: +lng.toFixed(3),
                        });
                    }
                }
            }
            console.log(this.coordinates);
        },
        decrease1(fnumber) {
            console.log(fnumber);
            switch (fnumber) {
                case 1:
                    if (this.stanze == 0) {
                        this.stanze = 0;
                    } else {
                        this.stanze = this.stanze - 1;
                    }
            }
        },
        decrease2(fnumber) {
            switch (fnumber) {
                default:
                    console.log("mannaggia");
                    if (this.camereDaLetto == 0) {
                        this.camereDaLetto = 0;
                    } else {
                        this.camereDaLetto = this.camereDaLetto - 1;
                    }
            }
        },
        increment1(fnumber) {
            console.log(fnumber);
            switch (fnumber) {
                default:
                    this.stanze = this.stanze + 1;
            }
        },

        increment2(fnumber) {
            switch (fnumber) {
                default:
                    this.camereDaLetto = this.camereDaLetto + 1;
            }
        },
        researchApartment() {
            this.ApartmentsChecked = [];


            this.Haversine(this.Lat, this.Lng);

            // for (let i = 0; i < this.Apartments.length; i++) {
            //     for (let j = 0; j < this.coordinates.length; j++) {
            //         if (
            //             this.Apartments[i].latitude == this.coordinates[j].lat &&
            //             this.Apartments[i].longitude == this.coordinates[j].lng
            //         ) {
            //             //this.ApartmentsChecked.push(this.Apartments[i]);
            //             if (this.Apartments[i].rooms >= this.stanze) {
            //                 if (this.Apartments[i].bedrooms >= this.camereDaLetto) {
            //                     console.log(this.Apartments[i].bedrooms);
            //                     if (this.services2.length == 0) {

            //                         this.ApartmentsChecked.push(this.Apartments[i]);
            //                     } else {





            //                         let fuckingFiltro = [];
            //                         for (let z = 0; z < this.services2.length; z++) {

            //                             for (let y = 0; y < this.Apartments[i].services.length; y++) {
            //                                 if (this.services2[z] == this.Apartments[i].services[y].id) {
            //                                     fuckingFiltro.push(1);
            //                                 }
            //                             }
            //                         }
            //                         console.log(fuckingFiltro);
            //                         if (fuckingFiltro.length == this.services2.length) {
            //                             console.log('whatever you fucking want');
            //                             this.ApartmentsChecked.push(this.Apartments[i]);
            //                         } else {

            //                         }

            //                     }
            //                 }
            //             }
            //         }
            //     }
            //     console.log("controllo finito");
            // }

            // let params = {};
            // params.coordinate = this.coordinates;
            // params.rooms = this.stanze;
            // params.bedrooms = this.camereDaLetto;


            // axios.get('/api/apartment', { params }).then((res) => {

            // })

            // for(let i=0; i<this.coordinates.length; i++) {

            //     let params = {};
            //     var latitudine = this.coordinates[i].lat ;
            //     var longitudine = this.coordinates[i].lng ;


            //     params.latitude = latitudine; //.latitudine pue' essere x
            //     params.longitude = longitudine;

            //     axios.get('/api/apartment', {params}).then((res)=>{

            //     })



            // }

            let params = {};
            params.distance = this.distanza;
            params.latitude = this.Lat.toFixed(3);
            params.longitude = this.Lng.toFixed(3);
            params.services = this.Service;

            axios.get('/api/apartment', {params}).then((res)=>{
                this.ApartmentsChecked = res.data;

            })







        },
        showSerarch() {
            var bar = document.getElementById("hello");
            if (bar.style.display == "none") {
                return (bar.style.display = "block");
            } else {
                return (bar.style.display = "none");
            }
        },
        updateServices() {
            this.services2 = this.services2.filter(service => this.Service.find(elem => elem.id === service));
        }
    }
}
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

.search {
    display: none;
    position: absolute;
    z-index: 1;
    border: 1px solid black;
    background-color: white;
    border-radius: 10px;
    padding: 10px;
    top: 50px;
    right: 0px;
}

.personal-bg-lightpink-reverse {
    background-image: linear-gradient(to top, #ffd2dc 20%, #fff0f3);
}

.height-93 {
    height: 93vh;
    overflow-y: scroll;
}
</style>
