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
        
        //ID DEL GRUPO
        public function GrupoConcatenado($GrupoCon){
            
            $stmt = self::$pdo->prepare("SELECT id_grup FROM $this->table WHERE CONCAT(grado, seccion, ' ', turno, ' ', periodo)=:GrupoCon");
            $stmt->bindParam(":GrupoCon",$GrupoCon);
            $stmt->execute();
            $cuenta = $stmt->rowCount(); //Contar filas

            if ($cuenta) {
                while ($row = $stmt->fetch()) {
                    $Aux = $row['id_grup'];
                }
                return $Aux;
            } else {
                return "0";
            }
        }
        
        //ID SIN GRUPO
        public function SinGrupo(){
            
            $stmt = self::$pdo->prepare("SELECT grupos.id_grup FROM grupos WHERE grupos.periodo='Sin grupo'");
            $stmt->execute();

            while ($row = $stmt->fetch()) {
                $Aux = $row['id_grup'];
            }
            return $Aux;
        }
    }