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
    <title>Menú principal</title>
    <link rel="stylesheet" media="all" href="../../css/stylebase.css"/>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
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

                    <div class="Banner-grid-item-izq" id="azul2">
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

                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Avisos Importantes</strong></h5>
                    </div>
                    <br>
                 <div class="" v-for="row in ResultadoConsulta">
                   
                    <h4>{{row.titulo}}</h4>
                    <h6>{{row.cuerpo}}</h6>

                    <br>

                    <div class="card-footer text-muted">
                        Publicado el {{row.fecha_hora}}
                    </div>
                    <div class="card-footer text-muted">
                        Publicado por {{row.nombre}}
                    </div>
                    
                    <br> <br> 

                    </div>
                    <div class="card text-center">
                        <div class="card-header"><strong></strong>
                    </div>
                    
                 </div>
                </div>
            
            </div>

            <!-- FOOTER -->
            <div v-if="c_footer" class="Footer-grid-container">

                <div class="Footer-grid-item-izq footer-hvr" id="azul2" v-on:click="Grupos">
                    <div class="Centrar">
                        <h2> Grupos </h2>
                    </div>
                </div>

                <div class="Footer-grid-item-cen footer-hvr" id="azul2" v-on:click="Informe">
                    <div class="Centrar">
                        <h2> Registro diario </h2>
                    </div>
                </div>

                <div class="Footer-grid-item-der footer-hvr" id="azul2" v-on:click="Buscar">
                    <div class="Centrar"> 
                        <h2> Buscar alumno</h2>
                    </div>
                </div>

            </div>
        </div>        
    </div>

    <!-- VERIFICAR ÚLTIMO INGRESO-->
    
    <!-- AXIOS -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- <script src="../../js/sesioniniciada_maestro.js"></script> -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- CÓDIGO JS/VUE-->
    <script>
        //MENSAJE
        var vm = new Vue ({
            el: "#app", //Elemento
            data: { 
                c_volver: 0,
                c_footer: 1,
                tipo_usuario:"maestro",
                Titulo_Principal: "Avisos",
                ResultadoConsulta:[]
            },
            methods: {
                CerrarSesion: function (event) {
                    window.location.href = "../../cerrarsession.php";
                },
                Informe: function (event) {
                    window.location.href = "ma_informe.html"
                },
                Buscar: function (event) {
                    window.location.href = "ma_seleccionar.html"
                },
                Grupos: function (event) {
                    window.location.href = "ma_grupos.html"
                },
                allavisos: function(event){
                    axios({
                       method: 'POST',
                       url: '../../php/all_avisos.php',
                       data: {
                        }
                   }) .then((response) => {
                       this.ResultadoConsulta=response.data;
                   })
                },
            },
            created(){
                this.allavisos();
            },
            computed: {

            }
        });
    </script>
</body>
</html>