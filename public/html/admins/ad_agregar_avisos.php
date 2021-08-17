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
    <title>registro Maestros</title>
    <link rel="stylesheet" media="all" href="../../css/stylegrup.css"/>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<style>
    .barrita
    {
        overflow: scroll;
    }

    .grid-itemContenido1{
    text-align: center;
    grid-column: 1/3;
    grid-row: 2/3; 
    z-index: 1;
}
</style>
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
                
                <div>       
                    <div class="col">
                        <h3>Título<span class="badge bg-secondary"></span></h3>
                        <input type="text" class="form-control" placeholder="Ingresar el titulo del aviso" v-model="titulo">
                    </div>
                    <div class="col">
                        <h3>Texto del aviso<span class="badge bg-secondary"></span></h3>
                        <textarea type="text" class="form-control" placeholder="el texto debe te contener menos de 255 caracteres maximos" v-model="Ctext" rows="11" maxlength="255"></textarea>
                        <br> <br>
                        <div class="d-grid">
                            <button type="button" class="btn btn-primary" v-on:click="Publicar">Publicar</button>
                        </div>
                    </div>                   
                </div>                 
            
           
        </div>
   

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
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
                Titulo_Principal: "Agregar nuevo aviso",
                Ctext:"",
                titulo:"",
                persona_av: "0",
            },
            methods: {
                CerrarSesion: function (event) {
                    window.location.href = "../../cerrarsession.php"
                },
                Volver: function (event) {
                    window.location.href = "ad_avisos.php"
                },
                Publicar: function (event) {
                    if(this.Ctext != "" && this.titulo != "" ){
                        if(this.Ctext.length<255){
                            var params = new URLSearchParams();
                            params.append('titulo', this.titulo);
                            params.append('cuerpo', this.Ctext);
                            params.append('persona_av', this.persona_av);
                            axios.post('../../controller_alta_avisos.php', params)

                        .then((response) => {
                                console.log(response);
                                alert("Anuncio publicado correctamente");
                                window.location.href = "ad_avisos.php"
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                        }else{
                            alert("Limite sobrepasado de caracteres del cuerpo, verifique nuevamente");
                        }
                    }else{
                        alert("Favor de llenar todos los campos obligatorios");
                    }
                }
            },
            created: function(){
              //CARGAR VARIABLES GLOBALES
              let data = localStorage.getItem("idcon"); //global correo
               if (data != null) {
                   this.persona_av = data;
               }
            },
            computed: {

            }
        });
    </script>
</body>
</html>