<?php

namespace proyecto;
    use PDO;
    use function json_encode;

    class personas_avisos extends Models
    {
        
        /**
         * @var array
         */
        protected $filleable = [
            "id_peav",
            "persona_av",
            "aviso"
            ];
        protected $table = "personas_avisos";

        public $id_peav = "";
        public $persona_av = "";
        public $aviso = "";
    
    public function datosPer($persona_av, $aviso){
        $stmt = self::$pdo->prepare("INSERT INTO $this->table(persona_av, aviso ) 
            VALUES (:persona_av, :aviso)");
        $stmt->bindParam(":persona_av",$persona_av);
        $stmt->bindParam(":aviso",$aviso);
        $stmt->execute();
    }
    public function BorrarAP($aviso){
        $stmt = self::$pdo->prepare("DELETE FROM $this->table Where aviso=:aviso");
        $stmt->bindParam(":aviso",$aviso);
        $stmt->execute();
    }
}