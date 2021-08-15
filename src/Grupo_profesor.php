<?php
    
    namespace proyecto;
 
    use PDO;
    use function json_encode;

    class Grupo_profesor extends Models
    {
        /**
         * @var array
         */
        protected $filleable = [
            "clave",
            "grupo",
            "profesor"
            ];
        
        protected $table = "grupo_profesor";

        public $clave = "";
        public $grupo = "";
        public $profesor = "";

        
        
    
    
        //ELIMINAR GRUPO
        public function EliminarGrupo($grupo){
            
            $stmt = self::$pdo->prepare("delete from $this->table where grupo=:grupo");
            $stmt->bindParam(":grupo",$grupo);
            $stmt->execute();
            
        } 

        //ALTA MAESTRO GRUPO
        public function NuevoMaestroG($grupo, $profesor){
            $stmt = self::$pdo->prepare("INSERT INTO $this->table(grupo, profesor) 
            VALUES (:grupo, :profesor)");
            $stmt->bindParam(":grupo",$grupo);
            $stmt->bindParam(":profesor",$profesor);

            $stmt->execute();
        }
        
        
    }