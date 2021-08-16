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
        
        //PROFESOR LOGIN
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

        //ALTA MAESTRO
        public function NuevoMaestro($persona_prof){
            $stmt = self::$pdo->prepare("INSERT INTO $this->table(persona_prof) 
            VALUES (:persona_prof)");
            $stmt->bindParam(":persona_prof",$persona_prof);
            $stmt->execute();
        }

        //ÚLTIMO PROFESOR
        public function UltimoProfe(){
            
            $stmt = self::$pdo->prepare("SELECT id_prof FROM $this->table ORDER BY id_prof DESC LIMIT 1");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $Aux = $row['id_prof'];
            }
            return $Aux;
        }

        //DE ID PERSONA A ID PROFESOR
        public function IDperAIDma($idcon){
            
            $stmt = self::$pdo->prepare("SELECT profesores.id_prof FROM profesores INNER JOIN personas on profesores.persona_prof=personas.id_per WHERE personas.id_per=:idcon");
            $stmt->bindParam(":idcon",$idcon);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($resultados){
                return  ($resultados[0]["id_prof"]); //Devolver sí hay al menos 1 resultado
            } else {
                return 0;
            }
        }

        //ELIMINAR PERSONA
        public function EliminarMaestro($persona_prof){
            
            $stmt = self::$pdo->prepare("delete from $this->table where persona_prof=:persona_prof");
            $stmt->bindParam(":persona_prof",$persona_prof);
            $stmt->execute();
            
        }
    }