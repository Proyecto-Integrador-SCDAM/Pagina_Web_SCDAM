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
    <title> Menú principal</title>
    <link rel="stylesheet" media="all" href="../../css/stylebase.css"/>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
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
.Cajabox{
    margin-top: 3vh;
    background-color: #DEF2F1;
}
.bote:hover{
    fill: red;
}
.bote{
    fill: black;
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

                <!-- Ingreso ala pagina agregar avisos -->
                <div class="Banner-grid-item-izq-filtros " id="azul3">
                    <div class="d-grid">
                      <button type="button" class="btn btn-primary" data-bs-dismiss="modal" v-on:click="AGavisos">Agregar nuevo aviso</button>
                    </div>
                  </div>

                <div class="card mb-3">
                <div v-for="row in ResultadoConsulta" class="Cajabox">
                   <br>
                    <h4>{{row.titulo}}
                            <svg style="float:right" v-on:click="EliminarAv(row.id_av)" type="button" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-trash bote" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                    </h4>
                    <h5>{{row.cuerpo}}</h5>

                    <br>

                    <div class="card-footer text-muted">
                        Publicado el {{row.fecha_hora}}
                    </div>
                    <div class="card-footer text-muted">
                        Publicado por {{row.nombre}}
                    </div>
                    <br>

                    </div>
                    <div class="card text-center">
                        <div class="card-header"><strong></strong>
                    </div>
                    
                </div>
                </div>

            </div>

            <!-- FOOTER -->
            <div v-if="c_footer" class="Footer-grid-container">

                <div class="Footer-grid-item-izq footer-hvr" id="azul2" v-on:click="EySadmin">
                    <div class="Centrar">
                        <h2> Editar grupos </h2>
                    </div>
                </div>

                <div class="Footer-grid-item-cen footer-hvr" id="azul2" v-on:click="Informe">
                    <div class="Centrar">
                        <h2> Informe diario </h2>
                    </div>
                </div>

                <div class="Footer-grid-item-der footer-hvr" id="azul2" v-on:click="Seleccionar">
                    <div class="Centrar"> 
                        <h2> Editar usuarios </h2>
                    </div>
                </div>

            </div>
        </div>        
    </div>

     <!-- AXIOS -->
     <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- VERIFICAR ÚLTIMO INGRESO-->
    <!-- <script src="../../js/sesioniniciada_admin.js"></script> -->
    <!-- CÓDIGO JS/VUE-->
    <script>
        //MENSAJE
        var vm = new Vue ({
            el: "#app", //Elemento
            data: { 
                c_volver: 0,
                c_footer: 1,
                tipo_usuario:"admin",
                Titulo_Principal: "Avisos",
                gcorreo: "",
                gid: "",
                ResultadoConsulta:""
            },
            methods: {
                CerrarSesion: function (event) {
                    window.location.href = "../../cerrarsession.php"
                },
                EySadmin: function (event) {
                    window.location.href = "ad_editar_grupos.php"
                },
                Informe: function (event) {
                    window.location.href = "ad_informe.php"
                },
                Seleccionar: function (event) {
                    window.location.href = "ad_seleccionar.php"
                },
                AGavisos: function(event){
                    window.location.href = "ad_agregar_avisos.php"
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
                EliminarAv:function(event){
                    
                    var mensaje = confirm("¿Desea borrar este aviso?");

                    if(mensaje){
                        var params = new URLSearchParams();
                        params.append('id_av', event);
                        axios.post('../../controller_borrar_aviso.php', params)
                        .then((response) => {
                            console.log(response);
                            this.allavisos();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    }
                }
            },
            created(){
                //CARGAR VARIABLES GLOBALES
               let data = localStorage.getItem("correocon"); //global correo
               if (data != null) {
                   this.gcorreo = data;
               }

               let data2 = localStorage.getItem("idcon"); //global id
               if (data2 != null) {
                   this.gid = data2;
               }

               this.allavisos();
            },
            computed: {

            }
        });
    </script>
</body>
</html>