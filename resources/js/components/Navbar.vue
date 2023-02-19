<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: #e3f2fd;">
  <div class="container-fluid d-flex">
    <img class="size-logo" src="https://www.ilfoglio.it/upload/1480336808148.png" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

    </div>
    <div>
        <ul class="d-flex list-unstyled m-0">
        <a href=""></a><li class="m-2 btn btn-success">accedi</li></a>
        <li class="btn btn-outline-success m-2"><a class="text-decoration-none" href="http://127.0.0.1:8000/admin/register">registrati</a></li>
    </ul>
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
