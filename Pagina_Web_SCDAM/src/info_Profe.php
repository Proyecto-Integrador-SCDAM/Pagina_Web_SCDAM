<?php

    namespace proyecto;
    use PDO;
    use function json_encode;

    class info_Profe extends Models
    {
        
        /**
         * @var array
         */
        protected $filleable = [
            "ID_PERSONA",
            "NOMBRE",
            "GENERO",
            "TELEFONO",
            "CORREO",
            ];
        protected $table = "info_prof";

        public $ID_PERSONA = "";
        public $NOMBRE = "";
        public $GENERO = "";
        public $TELEFONO = "";
        public $CORREO = "";

    }