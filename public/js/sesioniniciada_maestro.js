var vmRedLogin = new Vue ({
    //el: "#app2", //Elemento
    data: { 
        
    },
    methods:{        

        Redireccion: function (event) {
            window.location.href = '../../index.html'
        },
    },
    created(){
        //CARGA VARIABLE GLOBAL
        let data = localStorage.getItem("idcon");
        let data2 = localStorage.getItem("rol");
        if (data == "0" || data2 != 'Maestro') {
            this.Redireccion();
        }
    },
});