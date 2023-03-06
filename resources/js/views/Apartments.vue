<template>
    <div class="height-93 personal-bg-lightpink-reverse pb-3 position-relative">
        <div class="bottoneAlessia rounded-circle">
                <a href="/">
                    <i class="fa-solid fa-arrow-up"></i>
                </a>
        </div>

        <div class="d-flex m-auto justify-content-center justify-content-md-center align-items-center">
            <input type="hidden" name="latitude" id="inputLat" />
            <input type="hidden" name="longitude" id="inputLong" />

            <!-- Searchbar Geo -->
            <div id="inputIndirizzo" class="mt-3 col-9 col-md-6 col-lg-4 "></div>

            <div class="dropdown d-flex align-items-center">
                <a class="btn btn-secondary dropdown-toggle h-100" style="margin-top: 25px" href="#"
                    role="button" aria-expanded="false" @click="showSerarch()">
                    <i class="fa-solid fa-filter"></i>
                </a>

                <div class="position-relative" id="searchContainer"></div>
                <!--Stanze NUMERO 1-->

                <!-- Tendina Filtri -->
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
                                <input type="checkbox" :value="elem.id" v-model="services2" />
                                <span>{{ elem.typeOfService }}</span>
                            </label>
                        </div>
                    </div>

                    <!--distanza-->
                    <div class="px-3">
                        <p class="m-0">Distanza : {{ this.distanza }}</p>
                        <input type="range" min="2" max="20" v-model="distanza" />
                    </div>
                    <button @click="researchApartment()" class="bFilter p-1 px-2">
                        Applica
                    </button>
                </div>

                <div class="my-dropdown-menu"></div>
            </div>
        </div>

        <!-- Mostra numero appartamenti -->
        <div  class="p-3">
            <p v-if="ApartmentsChecked.length > 0">Numero Appartamenti: {{ ApartmentsChecked.length }}</p>
            <!-- RICORDATI di mettere un v-if appartamenti = 0 stampa "Non sono stati trovati appartamenti" -->
        </div>

        <!-- Stampa servizi selezionati dopo "Applica" -->
        <div class="d-flex justify-content-center">
            <div v-for="service in services2" :key="service.id">
                <div class="mx-1">
                    <span class="badge badge-pill badge-danger">{{ Service[service - 1]['typeOfService'] }}</span>
                </div>
            </div>
        </div>

        <!-- appartamenti -->
        <div class="p-3">
            <div v-if="this.soldatino == false" class="status justify-content-center justify-content-md-start flex-wrap">
                <!-- Ciclo stampa appartamenti -->
                <div v-for="apartment in Apartments" :key="apartment.id"
                    @click="incrementCounter(apartment.id)">
                    <!-- counter -->
                    <div v-if="counters[apartment.id] === undefined">
                        {{ $set(counters, apartment.id, 0) }}
                    </div>
                    <!--------------------->
                    <div v-if="apartment.visibility == 1">
                        <!-- Redirect Show singolo appartamento -->
                        <router-link class="text" :to="`/showed/${apartment.id}`">
                            <!-- Carta -->
                            <div id="card" class="card border mb-3 mr-md-3" style="width: 300px; height: 500px; border-radius: 20px">
                                <!-- Div immagine -->
                                <div style="width: 100%; height: 200px" @click="incrementCounter(apartment.id)">
                                    <!-- Controllo immagine non trovata -->
                                    <img v-if="apartment.cover == null" style="border-radius: 20px" class="h-100"
                                        src="https://cdn.open2b.com/5jwg8ozdvx/var/products/218/07/0-ac06c2c2-416-fornitura-di-proiettore-di-immagini-oleografiche.jpg"
                                        alt="fff" />
                                    <img v-else class="w-100 h-100" style="
                              border-radius: 20px;
                              overflow: hidden;
                              object-fit: cover;
                            " :src="`/storage/${apartment.cover}`" alt="apartment-image" />
                                </div>

                                <div class="card-body">
                                    <div style="height: 150px">
                                        <h5 class="card-title">{{ apartment["title"] }}</h5>
                                        <!-- Dettagli -->
                                        <div class="d-flex justify-content-center mb-3">
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

                                        <!-- Dettagli Servizi -->
                                        <div class="d-flex justify-content-center">
                                            <div class="d-flex flex-wrap w-100 justify-content-center">
                                                <span v-for="elem in apartment['services']" :key="elem.id"
                                                    class="badge badge-pill badge-primary personal-lightblue-gradient m-1">{{
                                                        elem.typeOfService }}
                                                </span>
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
            <div v-else class="status justify-content-center justify-content-md-start flex-wrap">
                <div v-for="apartment in ApartmentsChecked" :key="apartment.id" @click="incrementCounter(apartment.id)">
                    <!-- counter -->
                    <div v-if="counters[apartment.id] === undefined">
                        {{ $set(counters, apartment.id, 0) }}
                    </div>
                    <div v-if="apartment.visibility == 1" class="centramento">
                        <!-- Redirect Show singolo appartamento -->
                        <router-link class="text" :to="`/showed/${apartment.id}`">
                            <!-- Carta -->
                            <div id="card" class="card border mb-3 mr-md-3"
                                style="width: 300px; height: 500px; border-radius: 20px">
                                <div style="
                            width: 100%;
                            height: 200px;
                            object-fit: cover;
                            overflow: hidden;"
                            @click="incrementCounter(apartment.id)">
                                    <!-- Controllo immagine non trovata -->
                                    <img v-if="apartment.cover == null" class="w-100"
                                        src="https://cdn.open2b.com/5jwg8ozdvx/var/products/218/07/0-ac06c2c2-416-fornitura-di-proiettore-di-immagini-oleografiche.jpg"
                                        alt="fff" />
                                    <img v-else class="w-100" style="border-radius: 10px"
                                        :src="`/storage/${apartment.cover}`" alt="apartment-image" />
                                </div>

                                <div class="card-body" style="height: 150px">
                                    <div style="height: 150px">
                                        <h5 class="card-title">{{ apartment["title"] }}</h5>
                                        <!-- Dettagli -->
                                        <div class="d-flex justify-content-center mb-3">
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
                                        <!-- Dettagli Servizi -->
                                        <div class="d-flex justify-content-center">
                                            <div class="d-flex flex-wrap w-100 justify-content-around">
                                                <span v-for="elem in apartment['services']" :key="elem.id"
                                                    class="badge badge-pill badge-primary personal-lightblue-gradient mb-2">{{
                                                        elem.typeOfService }}</span>
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
            counters: [],
            soldatino: false,
            camereDaLetto: 0,
            stanze: 0,
            distanza: 5,
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
    created() {
        this.counters = JSON.parse(localStorage.getItem("counters")) || {};
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
        // counter
        incrementCounter(apartmentId) {
            console.log(apartmentId);
            axios.post('api/statistic', {
                apartmentId: apartmentId,
            }).then((res) => {
                console.log(res);
            })
        },
        getPivot() {
            axios.get("http://127.0.0.1:8000/api/pivot").then((response) => {
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



            let params = {};
            params.distance = this.distanza;
            params.latitude = this.Lat.toFixed(3);
            params.longitude = this.Lng.toFixed(3);
            params.services = this.Service;
            params.rooms = this.stanze;
            params.bedrooms = this.camereDaLetto;

            axios.get("/api/apartment", { params }).then((res) => {
                //this.ApartmentsChecked = res.data;
                if (this.services2.length == 0) {
                    this.ApartmentsChecked = res.data;
                } else {
                    let fuckingFiltro = [];

                    for (let z = 0; z < res.data.length; z++) {
                        for (let y = 0; y < res.data[z].services.length; y++) {
                            for (let v = 0; v < this.services2.length; v++) {
                                if (res.data[z].services[y].id == this.services2[v]) {
                                    fuckingFiltro.push("motherfucker");
                                }
                            }
                            console.log(fuckingFiltro);
                            if (fuckingFiltro.length == this.services2.length) {
                                this.ApartmentsChecked.push(res.data[z]);
                                fuckingFiltro = [];
                            }
                        }
                    }
                }
            });
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
            this.services2 = this.services2.filter((service) =>
                this.Service.find((elem) => elem.id === service)
            );
        },
    },
};
</script>


<style lang="scss" scoped>

.status {
    display: flex;
}
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

.marginPORCODIOCANE {
    margin: 0 auto;
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

.personal-lightblue-gradient {
    background-color: #e84c69;
}

.height-93 {
    height: 93vh;
    overflow-y: scroll;
}

@media screen and (max-width: 425px) {
    .bottoneAlessia{
        position: fixed;
        z-index: 1;
        bottom: 20px;
        right: 20px;
        background-color: #e84c69;
        color: white;
        padding: 5px 10px;
        a {
            text-decoration: none;
            color: inherit;
            i {
                font-size: 1rem;
            }
        }
    }
}

@media screen and (min-width: 425px) {
    .card:hover {
        transform: scale(1.1);
    }

    .bottoneAlessia{
        position: fixed;
        z-index: 1;
        bottom: 40px;
        right: 40px;
        background-color: #e84c69;
        color: white;
        padding: 10px 15px;
        a {
            text-decoration: none;
            color: inherit;
            i {
                font-size: 1.5rem;
            }
        }
    }
}


@media screen and (max-width: 650px) {
    .status{
        display: block;
    }

    #card{
        margin: auto;

    }

    .centramento{
        display: flex;
        justify-content: center;
        margin-top: 1rem;
    }
}


.gap-15 {
    gap: 15px;
}



</style>
