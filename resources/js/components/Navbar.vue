<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary position-relative p-3" style="background-color: #e3f2fd;">
            <div class="container-fluid d-flex">
                <!-- left side -->
                <a href="/">
                    <img class="size-logo w-50" src="../assets/B.png" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <!-- right side -->
                <div v-if="isLoggedIn" class="d-flex align-items-center">
                    <img src="https://thumbs.dreamstime.com/b/immagine-del-segnaposto-di-profilo-siluetta-grigia-nessuna-foto-127393483.jpg"  class="rounded-circle me-2 w-100 pointer"  width="30" height="30" alt="profile" @click="droptable()">
                    <div class="dropdown">
                        <a class=" text-decoration-none text-dark" href="#" role="button"
                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ authUser.name }}
                        </a>
                    </div>
                </div>
                <div v-else-if="logout">
                    <ul>
                        <li><a href="/login">Prova</a></li>
                        <li><a href="/register">Registrati</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="dropdown-column" id="dropbar">
            <ul>
                <li class="d-flex justify-content-end my-2"><a href="/admin/index">i miei appartamenti</a></li>
                <li class="d-flex justify-content-end mx-2"><a href="#" @click="logout">Logout</a></li>
            </ul>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Navbar',
    data() {
        return {
            authUser: false, // inizialmente impostata a null
        };
    },
    created() {
        // chiamata API per verificare lo stato di autenticazione dell'utente
        axios.get('/api/User').then((response) => {
            this.authUser = response.data;

        });
    },
    computed: {
        isLoggedIn() {
            return this.authUser !== false;
        },

    },
    methods: {
        logout() {
            axios.post('/logout').then(() => {
                this.authUser = false;
            });
        },

        droptable() {
            var menu = document.getElementById('dropbar');

            if (menu.style.display === 'none') {
                menu.style.display = 'block';
            } else {
                menu.style.display = 'none';
            }



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

ul{
  list-style: none;

}

li:hover{
    background-color: crimson;
}

.pointer{
    cursor: pointer;
}

a{
    text-decoration: none;
    color: white;
}


</style>
