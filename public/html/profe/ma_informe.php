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
    <title>Informe diario</title>
    <link rel="stylesheet" media="all" href="../../css/stylebase.css"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

    <!--HABILITAR TOOLTIPS-->
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

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
              <!-- INPUT -->
              <input v-on:keyup="Editando" v-model="searchval" type="text" class="form-control EspacioSup" aria-label="Text input with dropdown button" placeholder="Escriba un texto para buscar">
                <!-- TABLA -->
                <table class="table table-primary table-hover table-bordered border-info table-striped">
                    <thead>
                        <!-- COLUMNAS -->
                      <tr>
                        <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="Filtrar por número">#</th>
                        <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="Filtrar por Nombre">Nombre</th>
                        <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="Filtrar por Evento">Evento</th>
                        <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="Filtrar por Fecha">Fecha y hora</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr v-for="row in allData">
                          <td> {{ row.id_reg }} </th>
                          <td> {{ row.nombre }} </td>
                          <td> {{ row.estado }} </td>
                          <td> {{ row.fecha_hora }} </td>
                        </tr>
                    </tbody>
                </table>
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
                Titulo_Principal: "INFORME DIARIO",
                allData: '',
                searchval: '',
                idcon: ''
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
                       url: '../../php/ma_registro.php',
                       action: 'fetchall',
                       data: {
                        idcon: this.idcon
                      }
                   }) .then((response) => {
                    this.allData = response.data;
                   })
                },
                Editando: function (event) {
                axios({
                       method: 'POST',
                       url: '../../php/ma_registro_filtro.php',
                       action: 'fetchall',
                      data: {
                           searchval: this.searchval,
                           idcon: this.idcon
                      }
                   }) .then((response) => {
                    this.allData = response.data;
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
            },
            computed: {

            }
        });
    </script>
</body>
</html>