
       //MENSAJE
       var vm = new Vue ({
           el: "#app", //Elemento
           data: { 
               corr_rec: "recuperarcontra@uttcampues.edu.mx",
               correocon: "",
               contracon: "",
               Respuesta: "",
               idcon: "",
               ResultadoConsulta:[
                   {Con_usuario:""}
               ]
           },
           methods:{        
               LoginTry: function (event) {
                   axios({
                       method: 'POST',
                       url: '/src/accountlogin.php',
                       data: {
                           correocon: this.correocon,
                           contracon: this.contracon
                       }
                   }) .then((response) => {
                       this.ResultadoConsulta=response.data;
                       this.Respuesta = this.ResultadoConsulta["Con_usuario"];
                       this.idcon = this.ResultadoConsulta["Con_id"];
                       this.Redireccion();
                   })
               },
               Redireccion: function (event) {
                   localStorage.setItem("correocon", this.correocon);
                   localStorage.setItem("idcon", this.idcon);
                   switch (this.Respuesta) {
                       case 'Admin':
                       window.location.href = '/admins/ad_avisos.html'
                           break;
                       case 'Maestro':
                       window.location.href = '/profe/ma_avisos.html'
                           break;
                       case 'Alumno':
                       window.location.href = '/alumno/al_avisos.html'
                           break;
                       case 'No registrado':
                           alert("Correo o contraseña incorrecto");
                           break;
                       default:
                           alert("Error al enviar información");
                       break;
                   }
               },
               Formatear: function () {
                //localStorage.setItem("idcon", "0");
                alert("Se borró");
               }
           },
           created(){
               //CARGA VARIABLE GLOBAL
               let data = localStorage.getItem("correocon");
               if (data != null) {
                   this.correocon = data;
               }
               let data2 = localStorage.getItem("idcon");
               if (data2 == 0) {
                this.Formatear();
               }
           },
           computed: {
              
           }
       });

