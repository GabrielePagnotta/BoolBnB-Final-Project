<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
  <div class="container-fluid d-flex">
    <a href="/">
        <img class="size-logo w-50" src="../assets/B.png" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

    </div>
    <div class="d-flex">
        <a href="/login" class="m-2 btn btn-success">accedi</a>
       <a class="text-decoration-none btn btn-outline-success m-2" href="/register">registrati</a>
    </div>
  </div>
</nav>
    </div>
</template>

<script>
    export default {
        name:'Navbar'
    }
</script>

<style lang="scss" scoped>
    .size-logo{
        width: 7%;
    }
</style>
