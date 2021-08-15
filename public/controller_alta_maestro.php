<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        
        
        #ALTA PERSONA
        $per=new Persona();        
        $per->AltaPersona($nombre, $apellido_paterno, $apellido_materno, $genero, $telefono, $correo, $fecha_nacimiento, $u_password, $NFC, $permiso, $causa_denegada);

        #ALTA MAESTRO
        $pr=new Profesor();
        $pr->NuevoMaestro($per->UltimaPersona());        

        #GRUPO
        $gr= new Grupo();
        $grupos = $gr->GrupoASC();

        #RESPUESTA

        $RespuestaCon = $gr->ContarGrupos();

        echo json_encode($RespuestaCon);


    } catch (Exception $e) {
        echo($e->getMessage());
    }