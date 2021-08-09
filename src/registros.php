<?php
    
    namespace proyecto;
 
    use PDO;
    use function json_encode;

    class registros extends Models
    {
        /**
         * @var array
         */
        protected $filleable = [
            "id_reg",
            "fecha_hora",
            "estado",
            "ubicacion",
            "persona_r",
            ];
        
        protected $table = "registro";

        public $id_reg = "";
        public $fecha_hora = "";
        public $estado = "";
        public $ubicacion = "";
        public $persona_r = "";
    }