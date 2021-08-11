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

        public function AltaPersona($nombre, $apellido_paterno, $apellido_materno, $genero, $telefono, $correo, $fecha_nacimiento, $u_password, $NFC, $permiso, $causa_denegada){
            $permiso = (int)$permiso;
            $stmt = self::$pdo->prepare("INSERT INTO $this->table (nombre, apellido_paterno, apellido_materno, genero, telefono, correo, fecha_nacimiento, u_password, NFC, permiso, causa_denegada)
            VALUES (:nombre, :apellido_paterno, :apellido_materno, :genero, :telefono, :correo, :fecha_nacimiento, :u_password, :NFC, :permiso, :causa_denegada)");
            $stmt->bindParam(":nombre",$nombre);
            $stmt->bindParam(":apellido_paterno",$apellido_paterno);
            $stmt->bindParam(":apellido_materno",$apellido_materno);
            $stmt->bindParam(":genero",$genero);
            $stmt->bindParam(":telefono",$telefono);
            $stmt->bindParam(":correo",$correo);
            $stmt->bindParam(":fecha_nacimiento",$fecha_nacimiento);
            $stmt->bindParam(":u_password",$u_password);
            $stmt->bindParam(":NFC",$NFC);
            $stmt->bindParam(":permiso",$permiso, PDO::PARAM_INT);
            $stmt->bindParam(":causa_denegada",$causa_denegada);
            

            $stmt->execute();
        }
        
        public function UltimaPersona(){
            
            $stmt = self::$pdo->prepare("SELECT id_per FROM $this->table ORDER BY id_per DESC LIMIT 1");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $Aux = $row['id_per'];
            }
            return $Aux;
        }

        //BUSCAR CORREO EXISTENTE
        public function CorreoExistente($correo){
            
            $stmt = self::$pdo->prepare("select correo from $this->table  where  correo=:correo");
            $stmt->bindParam(":correo",$correo);
            $stmt->execute();
            $cuenta = $stmt->rowCount(); //Contar filas

            if ($cuenta) {
                while ($row = $stmt->fetch()) {
                    $Aux = "correo";
                }
                return $Aux;
            } else {
                return "0";
            }
        }

        //BUSCAR CÓDIGO NFC EXITENTE
        public function NFCExistente($NFC){
            
            $stmt = self::$pdo->prepare("select NFC from $this->table  where  NFC=:NFC");
            $stmt->bindParam(":NFC",$NFC);
            $stmt->execute();
            $cuenta = $stmt->rowCount(); //Contar filas

            if ($cuenta) {
                while ($row = $stmt->fetch()) {
                    $Aux = "código NFC";
                }
                return $Aux;
            } else {
                return "0";
            }
        }
    }