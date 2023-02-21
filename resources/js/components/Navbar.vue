<template>
  <div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
      <div class="container-fluid d-flex">
        <!-- left side -->
        <a href="/">
          <img class="size-logo w-50" src="https://picsum.photos/id/10/50" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">

        </div>

        <!-- right side -->
        <div v-if="isLoggedIn" class="d-flex align-items-center">
          <img :src="authUser.profile_photo_url" class="rounded-circle me-2" width="30" height="30" alt="profile">
          <div class="dropdown">
            <a class="dropdown-toggle text-decoration-none text-dark" href="#" role="button" id="dropdownMenuLink"
              data-bs-toggle="dropdown" aria-expanded="false">
              {{ authUser.name }}
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#">Profilo</a></li>
            </ul>
        </div>
        <li><a class="dropdown-item" href="#" @click="logout">Logout</a></li>
        </div>
        <div v-else>
          <ul>
            <li><a href="/login">Accedi</a></li>
            <li><a href="/register">Registrati</a></li>
          </ul>
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
      authUser: false, // inizialmente impostata a null
    };
  },
  created() {
    // chiamata API per verificare lo stato di autenticazione dell'utente
    axios.get('/api/User').then((response) => {
      this.authUser = response.data;
      console.log(this.authUser)
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
  },
};
</script>

<style lang="scss" scoped>
.size-logo {
  width: 7%;
}
</style>
