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
    <title>Seleccionar</title>
    <link rel="stylesheet" media="all" href="../../css/stylebase.css"/>
    <link rel="stylesheet" media="all" href="../../css/style-buscar-alumno.css"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body> 
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
              <div class="input-group mb-3 EspacioSup">
                <input v-on:keyup="Editando" v-model="searchval" type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Escriba un texto para buscar">
                
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> {{ filtro }}</button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#" v-on:click="Filtrar('NOMBRE')">Por nombre</a></li>
                  <li><a class="dropdown-item" href="#" v-on:click="Filtrar('GRUPO')">Por grupo</a></li>
                  <li><a class="dropdown-item" href="#" v-on:click="Filtrar('MATRICULA')">Por matricula</a></li>
                  <li><a class="dropdown-item" href="#" v-on:click="Filtrar('ESPECIALIDAD')">Por especialidad</a></li>
                  <li><a class="dropdown-item" href="#" v-on:click="Filtrar('CORREO')">Por correo</a></li>
                  <li><a class="dropdown-item" href="#" v-on:click="Filtrar('PERMISO')">Por acceso</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" :class="{'active': orden == 'ASC'}" href="#" v-on:click="Ordenar('ASC')">Ascendente</a></li>
                  <li><a class="dropdown-item" :class="{'active': orden == 'DESC'}" href="#" v-on:click="Ordenar('DESC')">Descendente</a></li>
                </ul>
              </div>

              <!-- TABLA -->
              <table class="table table-primary table-hover table-bordered border-info table-striped">
                <thead>
                    <!-- COLUMNAS -->
                  <tr>
                    <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="Filtrar por número">Matrícula</th>
                    <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="Filtrar por Nombre">Nombre</th>
                    <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="Filtrar por Evento">Grupo</th>
                    <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="Filtrar por Ubicación">Especialidad</th>
                    <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="Filtrar por Fecha">Correo</th>
                    <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="Filtrar por Fecha">Acceso</th>
                  </tr>
                </thead>
                <tbody>
                    <!-- FILA 1 -->
                    <tr v-for="row in allData">
                        <td v-on:click="EditarPersona(row.MATRICULA)"> {{ row.MATRICULA }} </th>
                        <td v-on:click="EditarPersona(row.MATRICULA)"> {{ row.NOMBRE }} </td>
                        <td v-on:click="EditarPersona(row.MATRICULA)"> {{ row.GRUPO }} </td>
                        <td v-on:click="EditarPersona(row.MATRICULA)"> {{ row.ESPECIALIDAD }} </td>
                        <td v-on:click="EditarPersona(row.MATRICULA)"> {{ row.CORREO }} </td>
                        <td v-on:click="EditarPersona(row.MATRICULA)"> {{ row.PERMISO }} </td>
                    </tr>
                </tbody>
            </table>

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
                Titulo_Principal: "Buscar alumno",
                allData: '',
                searchval: '',
                filtro: 'NOMBRE',
                orden: 'ASC'
            },
            methods: {
              CargarTabla: function (event) {
                   axios({
                       method: 'POST',
                       url: '../../php/ma_buscar_alumnos.php',
                       action: 'fetchall',
                       data: {
                           filtro: this.filtro,
                           orden: this.orden,
                           correo: this.correo
                      }
                   }) .then((response) => {
                    this.allData = response.data;
                   })
               },
               Editando: function (event) {
                axios({
                       method: 'POST',
                       url: '../../php/ma_buscar_alumnos_filtro.php',
                       action: 'fetchall',
                      data: {
                           searchval: this.searchval,
                           filtro: this.filtro,
                           orden: this.orden,
                           correo: this.correo
                      }
                   }) .then((response) => {
                    this.allData = response.data;
                   })
                },
                EditarPersona:function(event)
                {
                  localStorage.setItem("editarper", event);
                  window.location.href = "ma_info_alu.php" 
                },
                Ordenar: function (event) {
                this.orden=event;
                this.Editando();
                },
                Filtrar: function (event) {
                this.filtro=event;
                this.Editando();
                },
                CerrarSesion: function (event) {
                    window.location.href = "../../cerrarsession.php"
                },
                Volver: function (event) {
                    window.location.href = "ma_avisos.php"
                },
            },
            created: function(){
              //CARGAR VARIABLES GLOBALES
              let data = localStorage.getItem("correocon"); //global correo
               if (data != null) {
                   this.correo = data;
               }
              this.CargarTabla();
            },
            computed: {

            }
        });
    </script>
</body>
</html>