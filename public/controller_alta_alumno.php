<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        
        /*
        $per=new Persona();        
        $per->AltaPersona($nombre, $apellido_paterno, $apellido_materno, $genero, $telefono, $correo, $fecha_nacimiento, $u_password, $NFC);
        */

        $Aux = "0";
        $gr= new Grupo();
        $Aux = $gr->GrupoConcatenado($dGrupo);

        if ($Aux == "0"){
            $Aux = $gr->SinGrupo();
        }

        $RespuestaCon = [
            "msg" => $Aux
        ];

        echo json_encode($RespuestaCon);


    } catch (Exception $e) {
        echo($e->getMessage());
    }