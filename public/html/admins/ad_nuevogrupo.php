<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAYOUT</title>
    <link rel="stylesheet" media="all" href="stylegrup.css"/>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

                    <div class="Banner-grid-item-izq" id="azul2">
                        <div class="Centrar">
                            <img v-if="c_volver == 1" src="imagenes/volver-flecha.png" height="50%" width="30%">
                        </div>
                    </div>

                    <div class="Banner-grid-item-cen" id="blanco1">
                        <div class="Centrar">
                            <h1> {{ Titulo_Principal }} </h1>
                        </div>
                    </div>

                    <div class="Banner-grid-item-der cerrarses" id="azul2">
                        <div class="Centrar"> 
                            <img src="imagenes/apagar.png" height="50%" width="30%">
                        </div>
                    </div>

                </div>
                
            </div>

            <!-- CONTENIDO (Página) -->
            <div class="grid-itemContenido">
                <form method="POST">
                    <div class="colfondo">
                        <h2 class="desc">AÑADE UN GRUPO<span class="badge bg-secondary"></span></h2>
                    </div>
                        <div class="row g-3">
                            <div class="col">
                                <h4>Id del grupo<span class="badge bg-secondary"></span></h4>
                              <input type="text" class="form-control" placeholder="1" aria-label="Disabled input example" disabled>
                            </div>
                            <div class="col">
                                <h4>Grado<span class="badge bg-secondary"></span></h4>
                                <input type="text" class="form-control" placeholder="Grado" aria-label="Last name">
                            </div>
                            <div class="col">
                                <h4>Sección<span class="badge bg-secondary"></span></h4>
                                <input type="text" class="form-control" placeholder="Sección" aria-label="Last name">
                              </div>
                              <div class="colfondo">
                                <h2 class="desc">ÚLTIMOS DATOS<span class="badge bg-secondary"></span></h2>
                            </div>
                              <div class="row g-3">
                                <div class="col">
                                    <h4>Turno<span class="badge bg-secondary"></span></h4>
                                  <select class="form-select" aria-label="Default select example">
                                    <option selected>Selecciona una opción</option>
                                    <option value="1">Matutino</option>
                                    <option value="2">Vespertino</option>
                                </select>
                            </div>
                            <div class="col">
                                <h4>Periodo<span class="badge bg-secondary"></span></h4>
                              <select class="form-select" aria-label="Default select example">
                                <option selected>Selecciona una opción</option>
                                <option value="1">Enero-Abril</option>
                                <option value="2">Mayo-Agosto</option>
                                <option value="3">Septiembre-Diciembre</option>
                            </select>
                        </div>
                            <div class="col">
                                <h4>Año<span class="badge bg-secondary"></span></h4>
                                <input type="text" class="form-control" placeholder="Año" aria-label="Last name">
                            </div>
                         </div>
                           <div class="cent">  
                            <button type="button" class="btn btn-success" v-on:click="Guardar">Guardar </button>
                            </div>
                        </div>
                    </div>
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
    </div>

    <!-- CÓDIGO JS/VUE-->
    <script>
        //MENSAJE
        var vm = new Vue ({
            el: "#app", //Elemento
            data: { 
                c_volver: 0,
                c_footer: 0,
                tipo_usuario:"admin",
                Titulo_Principal: "Nuevo grupo"
            },
            methods: {
                
            },
            computed: {

            }
        });
    </script>
</body>
</html>