<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        $c=new Persona();
        $Aux = "No registrado";
        $id = "";
        
        //echo ( $c->VerificarLogin($correocon, $contracon));
        $id = ( $c->VerificarLogin($correocon, $contracon));
                
        if ($id != 0){
            $al=new Alumno();
            $ma=new Profesor();
            $ad=new Administrador();


            if (($al->VerificarAlumno($id)) != 0){
                $Aux = "Alumno";
            } else if (($ma->VerificarProfesor($id)) != 0){
                $Aux = "Maestro";
            } else if (($ad->VerificarAdmin($id)) != 0){
                $Aux = "Admin";
            }
        }

        //$Respuesta["id"] = $id;
        //$Respuesta["tipo"] = $Aux;
        //echo json_encode($Aux);

        $RespuestaCon = [
            "Con_usuario" => $Aux,
            "Con_id" => $id
        ];

        //GLOBALES
        $auth=new Auth();
        $auth->setUser($RespuestaCon);

        echo json_encode($RespuestaCon);
   
    } catch (Exception $e) {
        echo($e->getMessage());
    }
