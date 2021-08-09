<?php
    
    namespace proyecto;
 
    use PDO;
    use function json_encode;

    class Persona extends Models
    {
        /**
         * @var array
         */
        protected $filleable = [
            "id_per",
            "nombre",
            "apellido_paterno",
            "apellido_materno",
            "genero",
            "telefono",
            "correo",
            "fecha_nacimiento",
            "u_password",
            "NFC",
            "permiso",
            "causa_denegada"
            ];
        
        protected $table = "personas";

        public $id_per = "";
        public $nombre = "";
        public $apellido_paterno = "";
        public $apellido_materno = "";
        public $genero = "";
        public $telefono = "";
        public $correo = "";
        public $fecha_nacimiento = "";
        public $u_password = "";
        public $NFC = "";
        public $permiso = "";
        public $causa_denegada = "";
        
    
    
        public function VerificarLogin($correo, $u_password){
            
            $stmt = self::$pdo->prepare("select *  from $this->table  where  correo=:correo AND u_password=:u_password");
            $stmt->bindParam(":correo",$correo);
            $stmt->bindParam(":u_password",$u_password);
            $stmt->execute();
            $cuenta = $stmt->rowCount(); //Contar filas

            if ($cuenta) {
                while ($row = $stmt->fetch()) {
                    $Aux = $row['id_per'];
                }
                return $Aux;
            } else {
                return "0";
            }
        }
        
        
    }