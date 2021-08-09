<?php
    
    namespace proyecto;
 
    use PDO;
    use function json_encode;

    class Profesor extends Models
    {
        /**
         * @var array
         */
        protected $filleable = [
            "id_prof",
            "persona_prof"
            ];
        
        protected $table = "profesores";

        public $id_prof = "";
        public $persona_prof = "";
        
        
    
    
        public function VerificarProfesor($persona_prof){
            
            $stmt = self::$pdo->prepare("select *  from $this->table  where  persona_prof=:persona_prof");
            $stmt->bindParam(":persona_prof",$persona_prof);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($resultados){
                return  json_encode($resultados[0]);
            } else {
                return 0;
            }
        }
        
        
    }