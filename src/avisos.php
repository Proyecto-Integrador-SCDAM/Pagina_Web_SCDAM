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

        //ELIMINAR TODOS LOS AVISOS SIN AUTOR
        public function EliminarSinAutor(){
            
            $stmt = self::$pdo->prepare("DELETE FROM $this->table WHERE id_av IN (SELECT avisos.id_av FROM avisos left join personas_avisos on personas_avisos.aviso=avisos.id_av WHERE personas_avisos.id_peav is null)");
            $stmt->execute();
            
        }

    }