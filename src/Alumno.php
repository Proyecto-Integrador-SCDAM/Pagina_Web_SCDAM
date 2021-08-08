<?php
    
    namespace proyecto;
 
    use PDO;
    use function json_encode;

    class Alumno extends Models
    {
        /**
         * @var array
         */
        protected $filleable = [
            "matricula",
            "persona_alu",
            "grupo_alu",
            "especialidad"
            ];
        
        protected $table = "alumnos";

        public $matricula = "";
        public $persona_alu = "";
        public $grupo_alu = "";
        public $especialidad = "";
        
        
    
        //VERIFICAR LOGIN ALUMNO
        public function VerificarAlumno($persona_alu){
            
            $stmt = self::$pdo->prepare("select *  from $this->table  where  persona_alu=:persona_alu");
            $stmt->bindParam(":persona_alu",$persona_alu);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($resultados){
                return  json_encode($resultados[0]); //Devolver sí hay al menos 1 resultado
            } else {
                return 0;
            }
        }

        //ELIMINAR GRUPO (Mover a grupo "Sin grupo")
        public function EliminarGrupo($grupo_alu){
            
            $stmt = self::$pdo->prepare("update $this->table SET grupo_alu = (SELECT grupos.id_grup FROM grupos WHERE grupos.periodo='Sin grupo')  where  grupo_alu=:grupo_alu");
            $stmt->bindParam(":grupo_alu",$grupo_alu);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }

        
        
    }