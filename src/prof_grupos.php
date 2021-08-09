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
            "CLAVE_PROFESOR",
            "NOMBRE",
            "GRUPO",
            "TURNO",
            "PERIODO",
            ];
        protected $table = "prof_grupos";

        public $CLAVE_PROFESOR = "";
        public $NOMBRE = "";
        public $GRUPO = "";
        public $TURNO = "";
        public $PERIODO = "";

    }