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
                      <h5 class="card-title"><strong>Aviso Importante</strong></h5>
                      <p class="card-text"><strong>Esta es la semana de pagos</strong><br>Favor de que todos los administradores 
                        suban en tiempo y forma si alguno de los alumnos tiene acceso a la escuela por su estado financiero</p>
                      <p class="card-text"><small class="text-muted">Publicado de 10  minutos</small></p>
                      <p class="card-text"><small class="text-muted">Publicado por la Lic. Alicia</small></p>
                    </div>
                    <img src="../../imagenes/acceso.jpg" class="imagen" >
                    <br>
                    <input class="form-control" type="text" placeholder="Escriba aqui" aria-label="default input example"> 
                    <br>
                    <div>
                        <button type="button" class="btn btn-primary">Editar</button>                
                    <button type="button" class="btn btn-danger">Eliminar</button>
                    </div>
                    <br>
                     </div>
                  <div class="card text-center">
                    <div class="card-header">
                        <strong></strong>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Tendran 3 semanas para ir dando de alta a los alumnos de nuevo ingreso</h5>
                      <p class="card-text"><strong>Favor de que sea lo mas pronto posible</strong></p>
                    </div>
                    <input class="form-control" type="text" placeholder="Aviso importante para dar de alta a los nuevos alumnos" aria-label="default input example"> 
                   <br>
                    <div>
                        <button type="button" class="btn btn-success">Publicar</button>               
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </div>
                    <br>
                    <div class="card-footer text-muted">
                      Publicado hace 2 horas
                    </div>
                    <div class="card-footer text-muted">
                        Publicado por Carlos Lopez
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
                gid: ""
            },
            methods: {
                CerrarSesion: function (event) {
                    window.location.href = "../../cerrarsession.php"
                },
                EySadmin: function (event) {
                    window.location.href = "ad_editar_grupos.html"
                },
                Informe: function (event) {
                    window.location.href = "ad_informe.html"
                },
                Seleccionar: function (event) {
                    window.location.href = "ad_seleccionar.html"
                },
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
            },
            computed: {

            }
        });
    </script>
</body>
</html>