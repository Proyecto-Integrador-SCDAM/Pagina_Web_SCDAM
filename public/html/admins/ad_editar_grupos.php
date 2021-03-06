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
    <title>Editar grupos</title>
    <link rel="stylesheet" media="all" href="../../css/stylebase.css"/>
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
.grid-container-titulos{
  display: grid;
  grid-template-rows: 1fr;
  grid-template-columns: 97fr 3fr;
  color: black;
  height: 37px;
}
.grid-item-titulo {
  background-color: #2B7A78;
  text-align: center;
  grid-column: 1 / 2;
  grid-row: 1 / 2;
  font-size: 25px;
  color: white;
}
.grid-item-trash {
  text-align: center;
  grid-column: 2 / 3;
  grid-row: 1 / 2; 
}
.Selector-Grupos{
    background-color: #17252A;
    width: 80vw;
    height: 80vh;
    overflow: auto;
}
.CentrarMenu {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 99vw;
    height: 80vh;
    position: fixed;
    z-index: 600;
    margin-top: 5vh;
}
.Sel-opc {
    background-color: #3AAFA9;
    border: 0.5px solid black;
}
.Sel-opc:hover {
    background-color: #2d8580;
}
.AvisoSel {
    background-color: rgb(133, 33, 33); 
    text-align: center; 
    color: white;
}
.bote:hover{
    fill: red;
}
.bote{
    fill: black;
}
.flechas:hover{
    fill: rgb(102, 255, 0);
}
.flechas{
    fill: black;
}
    </style>    
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

            <!-- CONTENIDO (P??gina) -->
            <div class="grid-itemContenido">

                 <div class="CentrarMenu" v-if="VerMoverGrupos">
                     <div class="Selector-Grupos"> 
                         <h1 style="color: white;"> Selecciona un grupo </h1>
                         <br>
                         <div type="button" class="Sel-opc" v-for="row1 in allData" v-on:click="CerrarSelect(row1.id_grup)"> {{row1.grado}}{{row1.seccion}} {{row1.turno}} {{row1.periodo}}</div>

                     </div> 
                </div>
              <br>
              <div class="d-grid gap-2">
                <button class="btn btn-success" type="button" v-on:click="NuevoGrupo">NUEVO GRUPO</button>
              </div>
              <br>

                <div v-for="row1 in allData">
                    <div class="grid-container-titulos">
                        <div class="grid-item-titulo">{{row1.grado}}{{row1.seccion}} {{row1.turno}} {{row1.periodo}}</div>
                        <div class="grid-item-trash"> 

                            <div class="dropdown">
                                <div type="button" v-if="row1.periodo == 'Sin grupo'" v-on:click="MoverGrupo" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-arrow-down-up flechas" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                                    </svg>
                                </div>
                            </div>


                            <svg v-if="row1.periodo != 'Sin grupo'" v-on:click="BorrarGrupo(row1.id_grup)" type="button" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-trash bote" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </div>
                    </div>
                    <table class="table table-primary table-hover table-bordered border-info table striped">
                        <thead>
                            <tr>
                                <th scope="col">Matr??cula</th>
                                <th scope="col">Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row2 in allData2" v-on:click="MoverAlumno(row2.matricula)">
                                <td v-if="row2.grupo_alu == row1.id_grup">{{row2.matricula}}</td>
                                <td v-if="row2.grupo_alu == row1.id_grup">{{row2.nombrec}}</td>
                            </tr>
                        </tbody>
                    </table>
                  <br>
                </div>
            </div>


            <!-- FOOTER -->
            <div class="AvisoSel" type="button" v-if="VerAvisoSel" v-on:click="CancelarTranslado">
                MODO DE TRANSLADO DE GRUPO ACTIVADO. PRESIONE AQU?? PARA DESACTIVAR
            </div>
        </div> 
        
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- VUE JS -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <!-- AXIOS -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> 

    <!-- C??DIGO JS/VUE-->
    <script>
        //MENSAJE
        var vm = new Vue ({
            el: "#app", //Elemento
            data: { 
                c_volver: 1,
                c_footer: 1,
                tipo_usuario:"admin",
                Titulo_Principal: "Editar grupos",
                allData: '',
                allData2: '',
                VerMoverGrupos: false,
                VerAvisoSel: false,
                GrupoSel: ''
            },
            methods: {
                CerrarSesion: function (event) {
                    window.location.href = "../../cerrarsession.php"
                },
                Volver: function (event) {
                    window.location.href = "ad_avisos.php"
                },
                NuevoGrupo: function (event) {
                    window.location.href = "ad_nuevo_grupo.php"
                },
                CargarTabla: function (event) {
                   axios({
                       method: 'POST',
                       url: '../../php/ad_editar_grupos.php',
                       action: 'fetchall',
                       data: {
                      }
                   }) .then((response) => {
                    this.allData = response.data;
                   })
               },
               CargarTabla2: function (event) {
                   axios({
                       method: 'POST',
                       url: '../../php/ad_editar_grupos_lista.php',
                       action: 'fetchall',
                       data: {
                      }
                   }) .then((response) => {
                    this.allData2 = response.data;
                   })
               },
               BorrarGrupo:function(event){

                    var mensaje = confirm("??Desea borrar este grupo?");
                    if (mensaje) {
                        var params = new URLSearchParams();
                        params.append('id_grup', event);
                        axios.post('../../controller_borrar_grupo.php', params)

                        .then((response) => {
                            console.log(response);
                            this.CargarTabla();
                            this.CargarTabla2();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    }

                    
                },
                MoverGrupo:function(event){
                    this.VerMoverGrupos = true;
                },
                CerrarSelect:function(event){
                    this.VerMoverGrupos = false;
                    this.VerAvisoSel = true;
                    this.GrupoSel = event;
                },
                CancelarTranslado:function(event){
                    this.VerAvisoSel = false;
                },
                MoverAlumno:function(event){
                    if (this.VerAvisoSel){
                        var params = new URLSearchParams();
                        params.append('mat', event);
                        params.append('id_grup', this.GrupoSel);
                        axios.post('../../controller_mover_alumno.php', params)

                        .then((response) => {
                            console.log(response);
                            this.CargarTabla2();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                    }
                }
            },
            created: function(){
              this.CargarTabla();
              this.CargarTabla2();
            },
            computed: {

            }
        });
    </script>
</body>
</html>