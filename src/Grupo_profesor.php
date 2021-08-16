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
        
        //CONSULTAR SI UN PROFESOR PERTENECE UN GRUPO ESPECÍFICO
        public function CompGrupoProfe($grupo, $idcon){
            
            $stmt = self::$pdo->prepare("SELECT grupo_profesor.grupo FROM grupo_profesor INNER JOIN profesores on grupo_profesor.profesor=profesores.id_prof INNER JOIN personas on personas.id_per=profesores.persona_prof WHERE grupo_profesor.grupo=:grupo AND personas.id_per=:idcon");
            $stmt->bindParam(":grupo",$grupo);
            $stmt->bindParam(":idcon",$idcon);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($resultados){
                return  1; //Devolver sí hay al menos 1 resultado
            } else {
                return 0;
            }
        }

        //ELIMINAR TODOS LAS RELACIONES DE UN PROFESOR CON GRUPO
        public function EliminarGruposProfe($idcon){
            
            $stmt = self::$pdo->prepare("DELETE FROM grupo_profesor WHERE grupo_profesor.profesor=(SELECT profesores.id_prof FROM profesores INNER JOIN personas ON personas.id_per=profesores.persona_prof WHERE personas.id_per=:idcon)");
            $stmt->bindParam(":idcon",$idcon);
            $stmt->execute();
            
        } 
        
    }