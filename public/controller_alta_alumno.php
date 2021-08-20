<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        
        #ID DEL GRUPO
        $Aux = "0";
        $gr= new Grupo();
        $Aux = $gr->GrupoConcatenado($id_grup);

        if ($Aux == "0"){
            $Aux = $gr->SinGrupo();
        }        
        
        #ALTA PERSONA
        $per=new Persona();        
        $per->AltaPersona($nombre, $apellido_paterno, $apellido_materno, $genero, $telefono, $correo, $fecha_nacimiento, $u_password, $NFC, $permiso, $causa_denegada);
        $Hist=new historial();
        $Hist->AltaPersona($nombre, $apellido_paterno, $apellido_materno, $genero, $telefono, $correo, $fecha_nacimiento, $u_password, $NFC, "1", "");
        #alta en historial
        #ALTA ALUMNO
        $al=new Alumno();        
        $al->AltaAlumno($per->UltimaPersona(), $Aux, $especialidad);

        #RESPUESTA

        $RespuestaCon = [
            "msg" => $Aux
        ];

        echo json_encode($RespuestaCon);


    } catch (Exception $e) {
        echo($e->getMessage());
    }