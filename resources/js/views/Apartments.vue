<template>
    <div>
        <h1>TUTTI GLI APPARTAMENTI:</h1>
        <div class="d-flex justify-content-center">
            <span @click="showApartments(false)" class="tag">tutti</span>
            <div v-for="service in Service" :key="service.id" @click="showApartments()">
                <div>
                    <div>

                        <span class="tag">{{ service['typeOfService'].toUpperCase() }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="this.showup" id="drf" class="d-flex justify-content-center m-4">
            <div v-for="apartment in Apartments" :key="apartment.id">
                <router-link class="text" :to="`/showed/${apartment.id}`">
                    <div id="card" class="card mx-3 border" style="max-width: 15rem; border-radius: 20px;">
                        <img v-if="apartment.cover == null" class="w-100"
                            src="https://cdn.open2b.com/5jwg8ozdvx/var/products/218/07/0-ac06c2c2-416-fornitura-di-proiettore-di-immagini-oleografiche.jpg"
                            alt="fff">
                        <img v-else class="w-100" style="border-radius: 10px;" :src="`/storage/${apartment.cover}`"
                            alt="apartment-image">
                        <div class="card-body">
                            <h5 class="card-title">{{ apartment['title'] }}</h5>
                            <!-- <p class="card-text">{{ elem['description'] }}</p> -->
                            <div class="d-flex justify-content-center">
                                <div class="d-flex w-100  justify-content-around ">
                                    <div>
                                        <i class="fa-solid fa-toilet px-2"></i>
                                        <span>{{ apartment['bathrooms'] }}</span>
                                    </div>

                                    <div>
                                        <i class="fa-solid fa-bed"></i>
                                        <span>{{ apartment['bedrooms'] }}</span>
                                    </div>
                                </div>
                                <div class="d-flex w-100 justify-content-around">

                                    <div>
                                        <i class="fa-solid fa-door-closed"></i>
                                        <span>{{ apartment['rooms'] }}</span>
                                    </div>

                                    <div>
                                        <i class="fa-solid fa-ruler-combined"></i>
                                        <span>{{ apartment['square_meters'] }}</span>
                                    </div>
                                </div>
                            </div>
                            <p class="text-center my-3"><strong>prezzo: </strong>{{ apartment['price'] }}€</p>
                        </div>
                    </div>

                </router-link>

            </div>
        </div>
        <div v-else-if="!this.showup">non ci sono appartamenti</div>
    </div>
</template>

<script>




export default {
    name: 'Apartments',
    components: {},
    data() {
        return {
            Apartments: [],
            Service: [],
            Relation: [],
            showup: false
        };
    },
    mounted() {
        this.getApartments();
        this.getServices();
        this.getRelation()
    },
    methods: {
        getApartments() {
            axios.get('http://127.0.0.1:8000/api/apartment')
                .then((response) => {
                    this.Apartments = response.data;

                })
        },
        getServices() {
            axios.get('http://127.0.0.1:8000/api/services')
                .then((response) => {
                    this.Service = response.data;
                })
        },
        getRelation() {
            axios.get('http://127.0.0.1:8000/api/aptservices')
                .then(response => {
                    const data = response.data;
                    data.forEach(elem => {
                        return this.Relation = elem.services.pivot
                    });
                })
        },
        showApartments() {
            this.showup= !this.showup
        }


    }
}

</script>


<style lang="scss" scoped>
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
</style>
