<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro Alumnos</title>
    <link rel="stylesheet" media="all" href="../../css/stylebase.css"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .barrita
        {
            overflow: scroll;
        }
        .color
        {
            background-color:#17252A;
        }
        .flex-container 
        {
            display: flex;
            justify-content: space-between;

        }
        .acomodar
        {
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }
        .mover
        {
            display: flex;
            margin-left: 4%;
        }
        .centro
        {
            display: flex;
            align-items: center;
            justify-content: space-around;
        }
        .letra
        {
            color:white;
        }
        .juntar
        {
            display: flex;
            margin-left: auto;
        }
        .flex-container
        {
            display: flex;
            justify-content: space-between;
        }

    </style>
</head>
<body>  
    <!--HABILITAR TOOLTIPS-->
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
          return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

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
                  <!-- OPERACIONES FOOTER -->
                  <form method="POST">
                    <div class="color">
                        <h2 class="letra">INFORMACIÓN PERSONAL<span class="badge bg-secondary"></span></h2>
                    </div>
                    <div class="row g-3">
                      <div class="col">
                          <h4>Nombre<span class="badge bg-secondary"></span></h4>
                        <input v-model="dNombre" type="text" class="form-control" placeholder="Nombre(s)" aria-label="First name">
                      </div>
                      <div class="col">
                          <h4>Apellido Paterno<span class="badge bg-secondary"></span></h4>
                          <input v-model="dAp" type="text" class="form-control" placeholder="Apellido Paterno" aria-label="Last name">
                      </div>
                      <div class="col">
                          <h4>Apellido Materno<span class="badge bg-secondary"></span></h4>
                          <input v-model="dAm" type="text" class="form-control" placeholder="Apellido Materno" aria-label="Last name">
                      </div>
                    </div>
                    <div class="row g-3">
                      <div class="col">
                        <h4>Fecha de Nacimiento<span class="badge bg-secondary"></span></h4>
                        <input v-model="dFecha" type="date" class="form-control" placeholder="Fecha de Nacimiento" aria-label="Last name">
                      </div>
                      <div class="col">
                        <h4>Teléfono<span class="badge bg-secondary"></span></h4>
                        <input v-model="dTel" type="text" class="form-control" placeholder="Telefono" aria-label="Last name">
                      </div>
                      <span class="radio">
                        <h4>Género<span class="badge bg-secondary"></span></h4>

                        <label>
                            <input value="f" v-model="dGenero" type="radio" class="radiobox" name="style-0a2" checked>
                            <span>Mujer</span> 
                        </label>

                        <label>
                          <input input value="m" v-model="dGenero" type="radio" class="radiobox" name="style-0a2">
                          <span>Hombre</span> 
                        </label>
                        
                        <label>
                          <input input value="i" v-model="dGenero" type="radio" class="radiobox" name="style-0a2">
                          <span>Indefinido</span> 
                        </label>
                      </span>
                    </div>
                    <br>

                    <div class="color">
                      <h2 class="letra">DATOS DE LA CUENTA<span class="badge bg-secondary"></span></h2>
                    </div>

                    <div class="row g-3">
                      <div class="col">
                        <h4>Correo<span class="badge bg-secondary"></span></h4>
                        <input v-model="dCorreo" type="email" class="form-control" placeholder="Correo" aria-label="Last name">
                      </div>
                      <div class="col">
                        <h4>Contraseña<span class="badge bg-secondary"></span></h4>
                        <input v-model="dContra" type="password" class="form-control" placeholder="Contraseña" aria-label="Last name">
                      </div>
                      <div class="row g-3 centro">
                        <div class="col-md-3">
                          <h4>Codigo NFC<span class="badge bg-secondary"></span></h4>
                          <input v-model="dNFC" type="text" class="form-control centro" placeholder="NFC" aria-label="Last name">
                        </div>

                          <div class="col-md-4 ">
                            <div class="form-check form-switch">
                              <div>
                                <label class="form-check-label cam" for="flexSwitchCheckChecked"><h4>Permitir Acceso</h4></label>
                              </div>
                              <div class="Centrar cam ">
                              <input v-model="dPermiso" style="width: 5vw; height: 2vw;" class="form-check-input izq" type="checkbox" id="flexSwitchCheckChecked" >
                            </div>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <h4>Causa denegacion<span class="badge bg-secondary"></span></h4>
                            <input v-model="dCausa" type="text" class="form-control" placeholder="Motivo" aria-label="Last name">
                          </div>
                        </div>
                        </div>
                        <br>
                        <h2 class="letra color">DATOS ACADEMICOS <span class="badge bg-secondary" ></span></h2> 
                        
                        <div class="flex-container">
                        <div class="col-md-4">
                            <h4>Grupo<span class="badge bg-secondary"></span></h4>
                                <select v-model="dGrupo" class="form-select" aria-label="Default select example">
                                    <option v-for="row1 in allData" selected>{{row1.grado}}{{row1.seccion}} {{row1.turno}} {{row1.periodo}}</option>
                                </select>
                        </div>
                        <div class="col-md-4">
                            <h4>Especialidad<span class="badge bg-secondary"></span></h4>
                                <select v-model="dEspecialidad" class="form-select" aria-label="Default select example">
                                    <option selected>Seleccione una opción</option>
                                    <option value="Administración">Administración</option>
                                    <option value="Contabilidad">Contabilidad</option>
                                    <option value="Electrónica">Electrónica</option>
                                    <option value="Enfermería">Enfermería</option>
                                    <option value="Máquinas y herramientas">Máquinas y herramientas</option>
                                    <option value="Mecánica">Mecánica</option>
                                    <option value="Programación">Programación</option>
                                    <option value="Química industrial">Química industrial</option>
                                    <option value="Ventas">Ventas</option>
                                </select>
                            </div>
                        </div>
                        <div class="cen"> 
                            <button type="button" class="btn btn-success col-md-2" v-on:click="VerificarUnicos">Dar de alta</button>
                        </div>
                        <br>
                        <br>
                    
                        <br>
                  </form>
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
                Titulo_Principal: "Registrar Alumnos",
                dNombre: "",
                dAp: "",
                dAm: "",
                dFecha: "",
                dTel: "",
                dGenero: "f",
                dCorreo: "",
                dContra: "",
                dNFC: "",
                dPermiso: "true",
                dCausa: "",
                dGrupo: "Sin grupo",
                dEspecialidad: "Seleccione una opción",
                msgUnico: "",
                allData: ''
            },
            methods: {
                CerrarSesion: function (event) {
                    window.location.href = "../index.html"
                },
                Volver: function (event) {
                    window.location.href = "ad_avisos.php"
                },
                Regis:function(event){
                    alert(this.dGrupo);
                },
                SinGuardar:function(event){
                    var mensaje = confirm("Desea salir sin guardar cambios?");
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
                VerificarUnicos:function(){
                    var params = new URLSearchParams();
                    params.append('dGrupo', this.dGrupo);

                    axios.post('../../controller_alta_alumno.php', params)

                    .then((response) => {
                        console.log(response);
                        this.ResultadoConsulta=response.data;
                        this.msgUnico = this.ResultadoConsulta["msg"];
                        alert(this.msgUnico);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
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