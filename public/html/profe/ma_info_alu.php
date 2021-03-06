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
    <title>Información alumno</title>
    <link rel="stylesheet" media="all" href="../../css/stylebase.css"/>
    <link rel="stylesheet" media="all" href="../../css/styleinfoalu.css"/>
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
                    <div class="center">
                        <h4>Datos del Alumno</h4>
                        <form method="post">
                            <div class="cent">
                                <h6><b>Nombre:</b> {{ResultadoConsulta["NOMBRE"]}}</h6>
                            </div> 
                            <div class="cent">
                                <h6><b>Carrera:</b> {{ResultadoConsulta["ESPECIALIDAD"]}}</h6>
                            </div> 
                            <div class="cent">
                                <h6><b>Matrícula:</b> {{ResultadoConsulta["MATRICULA"]}}</h6>
                            </div> 
                            <div class="cent">
                                <h6><b>Grupo:</b> {{ResultadoConsulta["GRUPO"]}}</h6>
                            </div>
                            <div class="cent">
                                <h6><b>Teléfono:</b> {{ResultadoConsulta["TELEFONO"]}}</h6>
                            </div> 
                            <div class="cent">
                                <h6><b>Género:</b> {{ResultadoConsulta["GENERO"]}}</h6>
                            </div> 
                            <div class="cent">
                                <h6><b>Acceso:</b> {{ResultadoConsulta["PERMISO"]}}</h6>
                            </div> 
                            <div class="cent" v-if="ResultadoConsulta['CAUSA'] != ''"> 
                                <h6><b>Causa de denegación:</b> {{ResultadoConsulta["CAUSA"]}}</h6>
                            </div> 
                        </form>
                    </div>
                </div>
            </div>

            <!-- CONTENIDO (Página) -->
            <div class="grid-itemContenido">

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
                matcon: 0,
                Titulo_Principal: "Información alumno",
                ResultadoConsulta:[]
            },
            methods: {
                CargarTabla: function (event) {
                   axios({
                       method: 'POST',
                       url: '../../php/ma_ver_alumno.php',
                       action: 'fetchall',
                       data: {
                           matcon: this.matcon
                      }
                   }) .then((response) => {
                    this.ResultadoConsulta = response.data;
                   })
               },
               CerrarSesion: function (event) {
                    window.location.href = "../../cerrarsession.php"
                },
                Volver: function (event) {
                    window.location.href = "ma_seleccionar.php"
                }
            },
            computed: {

            },
            created: function(){
              //CARGAR VARIABLES GLOBALES
              let data = localStorage.getItem("editarper"); //global correo
               if (data != null) {
                   this.matcon = data;
               }
              this.CargarTabla();
            },
        });
    </script>
</body>
</html>