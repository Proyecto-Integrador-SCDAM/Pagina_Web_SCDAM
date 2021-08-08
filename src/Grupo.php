<?php
    
    namespace proyecto;
 
    use PDO;
    use function json_encode;

    class Grupo extends Models
    {
        /**
         * @var array
         */
        protected $filleable = [
            "id_grup",
            "grado",
            "seccion",
            "turno",
            "periodo"
            ];
        
        protected $table = "grupos";

        public $id_grup = "";
        public $grado = "";
        public $seccion = "";
        public $turno = "";
        public $periodo = "";
        
        
        //ELIMINAR GRUPO
        public function EliminarGrupo($id_grup){
            
            $stmt = self::$pdo->prepare("delete from $this->table where id_grup=:id_grup");
            $stmt->bindParam(":id_grup",$id_grup);
            $stmt->execute();
            //$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }        
    }