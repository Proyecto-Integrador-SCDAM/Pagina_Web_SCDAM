<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro Maestros</title>
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
            justify-content: center;
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
        .CentrarH {
          display: flex;
          flex-direction: column;
          align-items: center;
          justify-content: center;
          width: 100vw;
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
                          <h4>Código NFC<span class="badge bg-secondary"></span></h4>
                          <input v-model="dNFC" type="text" class="form-control centro" placeholder="NFC" aria-label="Last name">
                        </div>

                          <div class="col-md-4 ">
                            <div class="form-check form-switch">
                              <div>
                                <label class="form-check-label cam" for="flexSwitchCheckChecked"><h4>Permitir Acceso</h4></label>
                              </div>
                              <div class="Centrar cam ">
                              <input v-model="permisobool" style="width: 5vw; height: 2vw;" class="form-check-input izq" type="checkbox" id="flexSwitchCheckChecked" >
                            </div>
                            </div>
                          </div>
                          <div class="col-md-5">
                            <h4>Causa denegación<span class="badge bg-secondary"></span></h4>
                            <input :disabled="permisobool ? '' : disabled" v-model="dCausa" type="text" class="form-control" placeholder="Motivo" aria-label="Last name">
                          </div>
                        </div>
                        </div>
                        <br>
                    <h2 class="letra color">DATOS ESCOLARES <span class="badge bg-secondary" ></span></h2> 
                      <div class="CentrarH">
                          <h4>Grupos<span class="badge bg-secondary"></span></h4>
                            <ul class="list-group">
                            <li v-for="(row1, key, index) in allData" :key="index" v-if="row1.periodo != 'Sin grupo'" class="list-group-item">
                                <input v-model="checkedGrupo[key]" class="form-check-input me-1" :id="key" type="checkbox"  >
                                <label :for="key"> {{row1.grado}}{{row1.seccion}} {{row1.turno}} {{row1.periodo}} </label>
                              </li>
                            </ul>
                      </div>    
                      <div>
                        <br>
                        <div class="cen"> 
                          <button type="button" class="btn btn-success col-md-2" v-on:click="ArreglarVariables">Guardar cambios</button>
                        </div>
                        <br>
                        <br>
                        <div class="cen"> 
                          <button type="button" class="btn btn-danger col-md-2" v-on:click="Eliminar">Eliminar maestro</button>
                       </div>
                       <br>
                      </div>
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
                Titulo_Principal: "Modificar Maestro",
                dNombre: "",
                dAp: "",
                dAm: "",
                dFecha: "",
                dTel: "",
                dGenero: "f",
                dCorreo: "",
                dContra: "",
                dNFC: "",
                dPermiso: 1,
                dCausa: "",
                dGrupo: "",
                msgUnico: "",
                allData: {},
                permisobool: true,
                checkedGrupo: [],
                cantGrupos: 0,
                auxGrupo: "",
            },
            methods: {
                CerrarSesion: function (event) {
                    window.location.href = "../../index.html"
                },
                Volver: function (event) {
                    window.location.href = "ad_seleccionar_maestro.html"
                },
                DemoVar: function (event) {
                    //alert(this.checkedGrupo[4]);
                    //this.checkedGrupo[3] = true;
                },
                Eliminar:function(){
                  var mensaje = confirm("¿Desea eliminar este maestro?");
                  if (mensaje) {
                    var params = new URLSearchParams();
                    params.append('idcon', this.idcon);

                    axios.post('../../controller_eliminar_maestro.php', params)

                    .then((response) => {
                        console.log(response);
                        window.location.href = "ad_seleccionar_maestro.html";
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                  }
                },
                ContarGrupos:function(event){
                  axios({
                       method: 'POST',
                       url: '../../controller_contar_grupo.php',
                       action: 'fetchall',
                       data: {
                      }
                  }) .then((response) => {
                    this.cantGrupos = response.data;
                    this.SeleccionarGrupos();
                  })
                },
                SeleccionarGrupos:function(event){
                    for (var i = 0; i < this.cantGrupos; i++) {
                      this.ConsultarGrupoProfesor(i);
                      //this.MarcarGrupo(i, this.auxGrupo);
                      //alert(this.auxGrupo);                     
                    }
                },
                ConsultarGrupoProfesor: function (i) {
                  var params = new URLSearchParams();
                      params.append('grupo', this.allData[i]["id_grup"]);
                      params.append('idcon', this.idcon);

                      axios.post('../../controller_grupo_maestro.php', params)

                            .then((response) => {
                                console.log(response);
                                //this.auxGrupo = response.data;
                                //alert(response.data);
                                this.MarcarGrupo(i, response.data);
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                },
                MarcarGrupo: function (i, a) {
                    //alert(a + " " + i);
                    if (a == "1"){
                      this.checkedGrupo[i] = true;
                    }else {
                      this.checkedGrupo[i] = false;
                    }
                    //alert(this.checkedGrupo[i]);
                    //this.checkedGrupo[3] = true;
                },
                ArreglarSwitch:function(event){
                    if (this.dPermiso == "1"){
                        this.permisobool = true;
                    }else{
                        this.permisobool = false;
                    }
                    this.dCorreo = this.dCorreo.toLowerCase();
                    //alert(this.dPermiso)
                },
                CargarTablaPersonas:function(){
                    var params = new URLSearchParams();
                    params.append('idcon', this.idcon);

                    axios.post('../../controller_cargar_personas.php', params)

                    .then((response) => {
                        console.log(response);
                        this.ResultadoConsulta=response.data;
                        this.dNombre = this.ResultadoConsulta["nombre"];
                        this.dAp = this.ResultadoConsulta["apellido_paterno"];
                        this.dAm = this.ResultadoConsulta["apellido_materno"];
                        this.dFecha = this.ResultadoConsulta["fecha_nacimiento"];
                        this.dTel = this.ResultadoConsulta["telefono"];
                        this.dGenero = this.ResultadoConsulta["genero"];
                        this.dCorreo = this.ResultadoConsulta["correo"];
                        this.dContra = this.ResultadoConsulta["u_password"];
                        this.dNFC = this.ResultadoConsulta["NFC"];
                        this.dPermiso = this.ResultadoConsulta["permiso"];
                        this.dCausa = this.ResultadoConsulta["causa_denegada"];
                        this.ArreglarSwitch();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                },
                AsignarGrupos:function(event){
                    for (var i = 0; i < this.cantGrupos; i++) {
                        if (this.checkedGrupo[i]){
                            var params = new URLSearchParams();
                            params.append('id_grup', this.allData[i]["id_grup"]);
                            params.append('idcon', this.idcon);

                            axios.post('../../controller_cambios_grupo_maestro.php', params)

                            .then((response) => {
                                console.log(response);
                            })
                            .catch(function (error) {
                                console.log(error);
                            });
                        }
                    }
                    alert("Se han realizado los cambios correctamente");
                    //window.location.href = "ad_seleccionar_maestro.html"
                },
                CargarTabla: function (event) {
                   axios({
                       method: 'POST',
                       url: '../../controller_cargar_grupo.php',
                       action: 'fetchall',
                       data: {
                      }
                   }) .then((response) => {
                    this.allData = response.data;
                   })
                },
                ArreglarVariables:function(event){
                    if (this.permisobool){
                        this.dPermiso = 1;
                    }else{
                        this.dPermiso = 0;
                    }
                    this.dCorreo = this.dCorreo.toLowerCase();
                    this.Cambios();
                },
                VerificarUnicos:function(){ //CAMBIAR QUE NO CUENTE EL PROPIO
                    var params = new URLSearchParams();
                    params.append('dCorreo', this.dCorreo);
                    params.append('dNFC', this.dNFC);

                    axios.post('../../controller_verificar_unicos.php', params)

                    .then((response) => {
                        console.log(response);
                        this.ResultadoConsulta=response.data;
                        this.msgUnico = this.ResultadoConsulta["msg"];
                        if (this.msgUnico != "0"){
                            alert("El " + this.msgUnico + " introducido no está disponible");
                        }else{
                            this.Cambios();
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                },
                Cambios:function(){
                    var params = new URLSearchParams();
                    params.append('idcon', this.idcon);
                    params.append('nombre', this.dNombre);
                    params.append('apellido_paterno', this.dAp);
                    params.append('apellido_materno', this.dAm);
                    params.append('genero', this.dGenero);
                    params.append('telefono', this.dTel);
                    params.append('correo', this.dCorreo);
                    params.append('fecha_nacimiento', this.dFecha);
                    params.append('u_password', this.dContra);
                    params.append('NFC', this.dNFC);
                    params.append('permiso', this.dPermiso);
                    params.append('causa_denegada', this.dCausa);

                    axios.post('../../controller_cambios_maestro.php', params)

                    .then((response) => {
                        console.log(response);
                        //alert("Los cambios se han guardado exitosamente");
                        this.AsignarGrupos();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
                },
            },
            created: function(){

              let data = localStorage.getItem("editarper"); //global correo
               if (data != null) {
                   this.idcon = data;
              }
              this.CargarTabla();
              this.CargarTablaPersonas();
              this.ContarGrupos();
              //this.checkedGrupo[3] = true;
            },
            computed: {

            }
        });
    </script>
</body>
</html>