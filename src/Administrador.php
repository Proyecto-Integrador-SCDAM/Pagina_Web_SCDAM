<?php
    
    namespace proyecto;
 
    use PDO;
    use function json_encode;

    class Administrador extends Models
    {
        /**
         * @var array
         */
        protected $filleable = [
            "id_admin",
            "persona_ad"
            ];
        
        protected $table = "administradores";

        public $id_admin = "";
        public $persona_ad = "";
        
        
    
    
        public function VerificarAdmin($persona_ad){
            
            $stmt = self::$pdo->prepare("select *  from $this->table  where  persona_ad=:persona_ad");
            $stmt->bindParam(":persona_ad",$persona_ad);
            $stmt->execute();
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($resultados){
                return  json_encode($resultados[0]);
            } else {
                return 0;
            }
        }

        public function AltaAdmin($id){
            $stmt = self::$pdo->prepare("INSERT INTO $this->table (persona_ad) VALUES (:id)");
            $stmt->bindParam(":id",$id);
            $stmt->execute();
        }
        
        
    }