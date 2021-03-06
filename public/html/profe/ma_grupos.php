<?php
    namespace proyecto;

    require ("../../verificarmaestro.php")


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver grupos</title>
    <link rel="stylesheet" media="all" href="../../css/stylebase.css"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <style>
.letrasenelcentro
{
    display: flex;
    justify-content: center;
    color: black;
}
.imagen
{
    display: flex;
    height: 30vh;
    width: 30vh;
    justify-content: center;
    margin-left: 93vh;
}
    </style>   
    <!-- VUE -->
    <div id="app">
        <div class="grid-container" id="fixed">
            <!-- Barra superior -->
            <div class="grid-itemHeader" id="azul1">  
                <div class="Banner-grid-container">

                    <div class="Banner-grid-item-izq" id="azul2" v-on:click="Volver">
                        <div class="Centrar">
                            <img v-if="c_volver == 1" src="../../imagenes/volver-flecha.png" height="50%" width="30%">
                        </div>
                    </div>

                    <div class="Banner-grid-item-cen" id="blanco1">
                        <div class="Centrar">
                            <h1> {{ Titulo_Principal }} </h1>
                        </div>
                    </div>

                    <div class="Banner-grid-item-der cerrarses" id="azul2" v-on:click="CerrarSesion">
                        <div class="Centrar"> 
                            <img src="../../imagenes/apagar.png" height="50%" width="30%">
                        </div>
                    </div>

                </div>
            </div>

            <!-- CONTENIDO (Página) -->
            <div class="grid-itemContenido">
                <br>
                <div v-for="row1 in allData">
                  <h4 class="letrasenelcentro">{{row1.grado}}{{row1.seccion}} {{row1.turno}} {{row1.periodo}}</h4>
                  <table class="table table-primary table-hover table-bordered border-info table striped">
                     <thead>
                       <tr>
                         <th scope="col">Matrícula</th>
                         <th scope="col">Nombre</th>
                       </tr>
                     </thead>
                     <tbody>
                       <tr v-for="row2 in allData2">
                         <td v-if="row2.grupo_alu == row1.id_grup">{{row2.matricula}}</td>
                         <td v-if="row2.grupo_alu == row1.id_grup">{{row2.nombrec}}</td>
                       </tr>
                     </tbody>
                  </table>
                    <br>
                </div>
              </div>

            <!-- FOOTER -->
            <div v-if="(tipo_usuario == 'admin' || tipo_usuario == 'maestro') && c_footer" class="Footer-grid-container">

                <div class="Footer-grid-item-izq footer-hvr" id="azul2">
                    <div class="Centrar">
                        <h2> Opción 1 </h2>
                    </div>
                </div>

                <div class="Footer-grid-item-cen footer-hvr" id="azul2">
                    <div class="Centrar">
                        <h2> Opción 2 </h2>
                    </div>
                </div>

                <div class="Footer-grid-item-der footer-hvr" id="azul2">
                    <div class="Centrar"> 
                        <h2> Opción 3 </h2>
                    </div>
                </div>

            </div>
        </div>        
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- VUE JS -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <!-- AXIOS -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> 

    <!-- CÓDIGO JS/VUE-->
    <script>
        //MENSAJE
        var vm = new Vue ({
            el: "#app", //Elemento
            data: { 
                c_volver: 1,
                c_footer: 0,
                tipo_usuario:"admin",
                Titulo_Principal: "Ver grupos",
                allData: '',
                allData2: '',
                gid: '',
            },
            methods: {
                CerrarSesion: function (event) {
                    window.location.href = "../../cerrarsession.php"
                },
                Volver: function (event) {
                    window.location.href = "ma_avisos.php"
                },
                CargarTabla: function (event) {
                   axios({
                       method: 'POST',
                       url: '../../php/ma_editar_grupos.php',
                       action: 'fetchall',
                       data: {
                        idcon: this.idcon,
                      }
                   }) .then((response) => {
                    this.allData = response.data;
                   })
               },
               CargarTabla2: function (event) {
                   axios({
                       method: 'POST',
                       url: '../../php/ad_editar_grupos_lista.php',
                       action: 'fetchall',
                       data: {
                      }
                   }) .then((response) => {
                    this.allData2 = response.data;
                   })
               },
            },
            created: function(){
                //CARGAR VARIABLES GLOBALES
               let data = localStorage.getItem("idcon"); //global id
               if (data != null) {
                   this.idcon = data;
               }
                this.CargarTabla();
                this.CargarTabla2();
            },
            computed: {

            }
        });
    </script>
</body>
</html>