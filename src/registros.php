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

        //ELIMINAR REGISTROS DE UNA PERSONA
        public function EliminarRegistrosPersona($persona_r){
            
            $stmt = self::$pdo->prepare("delete from $this->table where persona_r=:persona_r");
            $stmt->bindParam(":persona_r",$persona_r);
            $stmt->execute();
            
        }
    }