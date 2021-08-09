<?php

    namespace proyecto;
    use PDO;
    use function json_encode;

    class info_Alu extends Models
    {
        
        /**
         * @var array
         */
        protected $filleable = [
            "MATRICULA",
            "NOMBRE",
            "GENERO",
            "TELEFONO",
            "CORREO",
            "ESPECIALIDAD",
            "GRUPO",
            "PERMISO"
            ];
        protected $table = "info_alu";

        public $MATRICULA = "";
        public $NOMBRE = "";
        public $GENERO = "";
        public $TELEFONO = "";
        public $CORREO = "";
        public $ESPECIALIDAD = "";
        public $GRUPO = "";
        public $PERMISO = "";

    }