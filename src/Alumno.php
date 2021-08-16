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

        //MOVER DE GRUPO
        public function MoverAlumno($matricula ,$grupo_alu){
            
            $stmt = self::$pdo->prepare("update $this->table SET grupo_alu=:grupo_alu  where  matricula=:matricula");
            $stmt->bindParam(":grupo_alu",$grupo_alu);
            $stmt->bindParam(":matricula",$matricula);
            $stmt->execute();
        }
        
        #ALTA ALUMNO
        public function AltaAlumno($persona_alu, $grupo_alu, $especialidad){
            
            $stmt = self::$pdo->prepare("INSERT INTO $this->table (persona_alu, grupo_alu, especialidad)
            VALUES (:persona_alu, :grupo_alu, :especialidad)");
            $stmt->bindParam(":persona_alu",$persona_alu);
            $stmt->bindParam(":grupo_alu",$grupo_alu);
            $stmt->bindParam(":especialidad",$especialidad);

            $stmt->execute();
        }

        //DE MATRICULA ID PERSONA
        public function MatAID($matricula){
            
            $stmt = self::$pdo->prepare("SELECT persona_alu from $this->table  where  matricula=:matricula");
            $stmt->bindParam(":matricula",$matricula);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($resultados){
                return  ($resultados[0]["persona_alu"]); //Devolver sí hay al menos 1 resultado
            } else {
                return 0;
            }
        }

        //CARGAR INFORMACIÓN DE ALUMNO
        public function CargarAlu($matricula){
            
            $stmt = self::$pdo->prepare("select *  from $this->table  where  matricula=:matricula");
            $stmt->bindParam(":matricula",$matricula);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($resultados){
                return  json_encode($resultados[0]); //Devolver sí hay al menos 1 resultado
            } else {
                return 0;
            }
        }

        //GRUPOS POR MATRÍCULA
        public function GrupoMat($matricula){
            
            $stmt = self::$pdo->prepare("SELECT * FROM $this->table INNER JOIN grupos ON alumnos.grupo_alu=grupos.id_grup WHERE alumnos.matricula=:matricula");
            $stmt->bindParam(":matricula",$matricula);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($resultados){
                return  json_encode($resultados[0]); //Devolver sí hay al menos 1 resultado
            } else {
                return 0;
            }
        }

        //ACTUALIZAR DATOS
        public function EditarAlumno($matricula, $especialidad, $grupo_alu){
            
            $stmt = self::$pdo->prepare("UPDATE $this->table SET especialidad = :especialidad, grupo_alu = :grupo_alu WHERE matricula=:matricula");
            $stmt->bindParam(":matricula",$matricula);
            $stmt->bindParam(":especialidad",$especialidad);
            $stmt->bindParam(":grupo_alu",$grupo_alu);


            $stmt->execute();
        }

        //ELIMINAR PERSONA
        public function EliminarAlumno($matricula){
            
            $stmt = self::$pdo->prepare("delete from $this->table where matricula=:matricula");
            $stmt->bindParam(":matricula",$matricula);
            $stmt->execute();
            
        }
    }