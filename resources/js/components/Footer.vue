<template>
    <div class="container-fluid d-flex justify-content-center footercontainer">
        <div class="text-center">
            <p>Developed by:</p>
            <div class="d-flex flex-wrap justify-content-center">
                <div>
                    <div class="mx-2 yuri"></div>
                    <p class="bold my-3">Yuri Di Domenico</p>
                </div>
                <div>
                    <div class="mx-2 ale"></div>
                    <p class="bold my-3">Alessia Carrera</p>
                </div>
                <div>
                    <div class="mx-2 andrea"></div>
                    <p class="bold my-3">Andrea Panzeri</p>
                </div>
                <div>
                    <div class="mx-2 gab"></div>
                    <p class="bold my-3">Gabriele Pagnotta</p>
                </div>


        </div>

        </div>
    </div>
</template>

<script>
    export default {
        name:'Footer'
    }
</script>

<style lang="scss" scoped>
    .footercontainer{
        background-color: #e57b8e;
        color:white;

    }



    .yuri{
        background-image: url(../assets/yuri.png);
        width:200px;
        height: 200px;
        background-color: white;
        background-size:76%;
        background-repeat: no-repeat;
        background-position: center;
        border-radius: 100px 100px 100px 100px;
    }

    .ale{
        background-image: url(../assets/alessia.jpg);
        width:200px;
        height: 200px;
        background-color: white;
        background-size:95%;
        background-repeat: no-repeat;
        background-position: center;
        border-radius: 100px 100px 100px 100px;
    }
    .gab{
        background-image: url(../assets/gab.png);
        width:200px;
        height: 200px;
        background-color: white;
        background-size:91%;
        background-repeat: no-repeat;
        background-position: center;
        border-radius: 100px 100px 100px 100px;
    }
    .andrea{
        background-image: url(../assets/andrea.png);
        width:200px;
        height: 200px;
        background-color: white;
        background-size:91%;
        background-repeat: no-repeat;
        background-position:bottom;
        border-radius: 100px 100px 100px 100px;
    }


    .bold{
        font-weight: bold;
    }
</style>
