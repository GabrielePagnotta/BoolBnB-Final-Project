<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary position-relative p-3" style="background-color: #e3f2fd;">
            <div class="container-fluid d-flex justify-content-around align-items-center">
                <!-- left side -->
                <div class="">
                   <a href="/" style="">
                    <img class="size-logo w-50" src="../assets/B.png" alt="logo">
                    <!-- <span class="text-dark">[Logo]</span> -->
                   </a>
                </div>

                    <!-- <input type="text" v-model="search" placeholder="Città/Indirizzo..."> -->
                    <div class="">
                        <!-- <label for="searchApartments" class="form-label">Email address</label> -->
                        <input type="text" class="form-control container-fluid" id="searchApartments" placeholder="Città/Indirizzo...">
                    </div>
                    <div class="">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>



                <!-- right side -->
                <div class="dropdown" v-if="authUser == null">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-address-card"></i>
                    </a>

                    <div class="dropdown-menu" style="left: auto; right: 0;">
                        <a class="dropdown-item text-reset" href="/login">Login</a>
                        <a class="dropdown-item text-reset" href="/register">Register</a>
                    </div>
                </div>
                <div class="dropdown" v-else>
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-address-card"></i>
                    </a>

                    <div class="dropdown-menu" style="left: auto; right: 0;">
                        <a class="dropdown-item text-reset" href="/admin/index">I Miei Appartamenti</a>
                        <a class="dropdown-item text-reset" @click="logout(), reloadPage()">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Navbar',
    data() {
        return {
            // inizialmente impostata a null
            authUser: window.authUser
        };
    },
    created() {
        console.log(this.authUser)
    },

    methods: {
        logout() {
            axios.post('/logout').then(() => {
                window.localStorage.removeItem('token');
                this.$router.push('/');
            });
        },
        reloadPage() {
            window.location.reload();
        }
    },
};
</script>

<style lang="scss" scoped>
.size-logo {
    width: 7%;
}

.dropdown-column {
    display: flex;
    justify-content: flex-end;
    position: absolute;
    left: 88%;
    top: 6%;
    width: 200px;
    padding: 5px;
    background-color: rgb(255, 139, 156);
    border-radius: 10px;
    display: none;
}

ul {
    list-style: none;

}

li:hover {
    background-color: crimson;
}

.pointer {
    cursor: pointer;
}

a {
    text-decoration: none;
    color: white;
}
</style>
