<?php

namespace proyecto;
    use PDO;
    use function json_encode;

    class avisos extends Models
    {
        
        /**
         * @var array
         */
        protected $filleable = [
            "id_av",
            "titulo",
            "cuerpo",
            "fecha_hora",
            ];
        protected $table = "avisos";

        public $id_av = "";
        public $titulo = "";
        public $cuerpo = "";
        public $fecha_hora = "";

        public function altaAvisos($titulo, $cuerpo){
            $stmt = self::$pdo->prepare("INSERT INTO $this->table(titulo, cuerpo, fecha_hora) 
            VALUES (:titulo, :cuerpo, CURRENT_TIMESTAMP)");
            $stmt->bindParam(":titulo",$titulo);
            $stmt->bindParam(":cuerpo",$cuerpo);
            $stmt->execute();
        }

        
        public function UltimoAviso(){
            
            $stmt = self::$pdo->prepare("SELECT id_av FROM $this->table ORDER BY id_av DESC LIMIT 1");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                $Aux = $row['id_av'];
            }
            return $Aux;
        }

    }