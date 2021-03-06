<?php
    namespace proyecto;

    require ("../../verificaradmin.php")
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar</title>
    <link rel="stylesheet" media="all" href="../../css/stylebase.css"/>
    <link rel="stylesheet" media="all" href="../../css/style.css"/>
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

              <!-- BOTONES -->
              <div class="grid-itemContenido">
                <div class="Banner-grid-container-filtros">
                  <div class="Banner-grid-item-izq-filtros " id="azul3">
                    <div class="d-grid">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal" v-on:click="SelAlumnos">Buscar alumnos</button>
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal" v-on:click="SelProfesores">Buscar profesores</button>
                      <button type="button" class="btn btn-success" data-bs-dismiss="modal" v-on:click="DarAlta"> Nuevo administrador</button>
                      <button type="button" class="btn btn-success" data-bs-dismiss="modal" v-on:click="Descargar"> Descargar historial de registros</button>
                  </div>
                </div>
              </div>

              <!-- INPUT -->
              <input v-on:keyup="Editando" v-model="searchval" type="text" class="form-control EspacioSup" aria-label="Text input with dropdown button" placeholder="Escriba un texto para buscar">

              <!-- TABLA -->
              <table class="table table-primary table-hover table-bordered border-info table-striped">
                <thead>
                    <!-- COLUMNAS -->
                  <tr>
                    <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="Filtrar por número">#</th>
                    <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="Filtrar por Nombre">Nombre</th>
                    <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="Filtrar por Evento">Teléfono</th>
                    <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="Filtrar por Ubicación">Correo</th>
                    <th scope="col" data-bs-toggle="tooltip" data-bs-placement="top" title="Filtrar por Fecha">Acceso</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- FILA 1 -->
                  <tr v-for="row in allData">
                    <td v-on:click="EditarPersona(row.ID_PERSONA)"> {{ row.ID_PERSONA }} </th>
                    <td v-on:click="EditarPersona(row.ID_PERSONA)"> {{ row.NOMBRE }} </td>
                    <td v-on:click="EditarPersona(row.ID_PERSONA)"> {{ row.TELEFONO }} </td>
                    <td v-on:click="EditarPersona(row.ID_PERSONA)"> {{ row.CORREO }} </td>
                    <td v-on:click="EditarPersona(row.ID_PERSONA)"> {{ row.PERMISO }} </td>
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
                Titulo_Principal: "Buscar administrador",
                allData: '',
                searchval: '',
                vista: 'info_admin'
            },
            methods: {
              CargarTabla: function (event) {
                   axios({
                       method: 'POST',
                       url: '../../php/ad_buscar_admins.php',
                       action: 'fetchall',
                       data: {
                           vista: this.vista
                      }
                   }) .then((response) => {
                    this.allData = response.data;
                   })
               },
               Editando: function (event) {
                axios({
                       method: 'POST',
                       url: '../../php/ad_buscar_admins_filtro.php',
                       action: 'fetchall',
                      data: {
                           searchval: this.searchval,
                           vista: this.vista
                      }
                   }) .then((response) => {
                    this.allData = response.data;
                   })
                },
                EditarPersona:function(event)
                {
                  localStorage.setItem("editarper", event);
                  window.location.href = "ad_cambios_admin.php" 
                },
              CerrarSesion: function (event) {
                    window.location.href = "../../cerrarsession.php"
                },
              Volver: function (event) {
                    window.location.href = "ad_avisos.php"
                },
              SelAlumnos:function(event)
                {
                  window.location.href = "ad_seleccionar.php" 
                },
              SelAdministradores:function(event)
                {
                  window.location.href = "ad_seleccionar_admin.php" 
                },
              DarAlta:function(event)
                {
                  window.location.href = "ad_alta_admin.php" 
                },
                
              Descargar:function(){
                  window.location.href="crearexcel.php"
                },
              SelProfesores:function(event)
                {
                  window.location.href = "ad_seleccionar_maestro.php" 
                },
              Admin1:function(event)
                {
                  window.location.href = "ad_cambios_admin.php" 
                },
            },
            created: function(){
              this.CargarTabla();
            },
            computed: {

            }
        });
    </script>
</body>
</html>