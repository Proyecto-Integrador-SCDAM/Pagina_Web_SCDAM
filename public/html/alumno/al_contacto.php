<?php
    namespace proyecto;

    require ("../../verificaralumno.php")
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACTO</title>
    <link rel="stylesheet" media="all" href="../../css/stylebase.css"/>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .inicio{
        font-family:Arial, Helvetica, sans-serif;
        display: grid;
        grid-template-columns: repeat(4fr, 25%);
        grid-template-rows: repeat(4fr, 25%);
        padding: 20px;
        height: 100vh;
        width: 100vw;
    }
    .texto1{
        position:relative;
        transform: translate(-50%, -50%);
        top: 70%;
        left: 49%;
        width: 660px;
        background-color:rgb(195, 235, 238);
        border-radius: 20px;
    }
    .texto1 form{ 
        padding: 0 60px;
        box-sizing: border-box;
    }
    form .prin{ 
        position: relative;
        border-bottom: 3px solid #78aa9d;
        margin: 20px;
    }
    .texto2{
        grid-column-start: 1;
        grid-column-end: 2;
        grid-row-start: 2;
        grid-row-end: 2;
        padding:10px;
    }
    .imagen{
        grid-column-start:2 ;
        grid-column-end: 4;
        grid-row-start: 1;
        grid-row-end: 3;
        height: 62vh;
        width: 50vw;
    }
    .redes{
        padding: 100px;
    }

    .redsocial{
        display: flex;
        justify-content: flex-end;
        align-items: flex-end;
        padding-top: 4%;
        padding-bottom: 600px;
    }
    .redsocial li{
        display:inline-block;
    }
    .pass{
        padding: 30px;
    }
    </style>
</head>
<body>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                <div class="Centrar">
                    <h1 class="colorr">UNIVERSIDAD TECNOLÓGICA DE TORREÓN</h1>    
                </div>   
            </div>
        <div class="inicio">
                <div class="texto1">
                    <form method="post">
                        <div class="prin">
                            <strong><label>Teléfono  y correo Servicios Escolares:</label></strong><p>8711023424 <br> escolares@edu.com</p>
                        </div>
                        <div class="prin">
                            <strong><label>Teléfono y correo Becas:</label></strong><p>8717906785 <br> becas@edu.mx</p>
                        </div>
                        <div class="prin">
                            <strong><label>Teléfono y correo contabilidad:</label></strong><p>8713465709  <br> conta@edu.com</p>
                        </div>
                    </form>
                </div>
                    <div class="redes">
                        <strong><h5></h5></strong>
                        <ul class="redsocial footer">
                            <li><a href="https://www.facebook.com/"> <img src="../../imagenes/facebook.png.crdownload" alt="1x1" width="50" height="50"></a></li>
                            <li><a href="https://www.instagram.com/"> <img src="../../imagenes/insta.png" alt="1x1" width="50" height="50"></a></li>
                            <li><a href="https://www.twitter.com/"> <img src="../../imagenes/logo-twitter.jpeg" alt="1x1" width="50" height="50"></a></li>
                            <li><a href="https://www.youtube.com/"> <img src="../../imagenes/youtube.png" alt="1x1" width="50" height="50"></a></li>
                        </ul>
                    </div> 

                    <iframe class="imagen" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14400.755722003762!2d-103.3209182!3d25.5320829!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc18fad7b464487e4!2sUniversidad%20Tecnol%C3%B3gica%20de%20Torre%C3%B3n!5e0!3m2!1ses!2smx!4v1627930311630!5m2!1ses!2smx" width="60" height="45" 
                    style="border:0; position:relative; top: 19%; left: 57%; transform: translate(-50%, -50%); height: 320px; width: 550px;" allowfullscreen="" loading="lazy"></iframe>
                </div> 
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

    <!-- CÓDIGO JS/VUE-->
    <script>
        //MENSAJE
        var vm = new Vue ({
            el: "#app", //Elemento
            data: { 
                c_volver: 1,
                c_footer: 0,
                tipo_usuario:"maestro",
                Titulo_Principal: "CONTACTO ESCUELA"
            },
            methods: {
                CerrarSesion: function (event) {
                    window.location.href = "../../cerrarsession.php"
                },
                Volver: function (event) {
                    window.location.href = "al_avisos.php"
                },
            },
            computed: {

            }
        });
    </script>
</body>
</html>