<template>
    <div>
        <nav class="navbar navbar-expand position-relative p-4 personal-bg-lightpink height-7 personal-shadow-bottom">
            <div class="container-fluid d-flex justify-content-between align-items-center px-4">
                <!-- left side -->
                <div class="personal-width">
                   <a href="/" style="">
                    <img class="size-logo w-100" src="../assets/B.png" alt="logo">
                    <!-- <span class="text-dark">[Logo]</span> -->
                   </a>
                </div>


                <div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>



                <!-- right side -->
                <div class="dropdown" v-if="authUser == null">
                    <a class="btn dropdown-toggle btn btn-light border-danger text-danger box-shadow text-fw" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-user"></i>

                    </a>

                    <div class="dropdown-menu" style="left: auto; right: 0;">
                        <a class="dropdown-item text-reset" href="/login">Login</a>
                        <a class="dropdown-item text-reset" href="/register">Register</a>
                    </div>
                </div>
                <div class="dropdown" v-else>
                    <a class="btn dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-user text-danger"></i>
                    </a>

                    <div class="dropdown-menu" style="left: auto; right: 0;">
                        <a class="dropdown-item text-reset" href="/admin/index">I miei appartamenti</a>
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
.height-7 {
    height: 7vh;
}

.personal-bg-lightpink {
    background-image: linear-gradient(to bottom, #ffd2dc 20% , #fff0f3);
}
.personal-shadow-bottom {
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
}
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

.personal-width {
    width: 150px;
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



// .personal-bg-pink {
//     background: #f7b2c2;
// }

// @media screen and (min-width: 1px) {
//   .personal-width{
//       width: 150px;
//   }
// }



</style>
