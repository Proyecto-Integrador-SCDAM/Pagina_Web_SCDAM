<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        $per=new Persona();        
        $per->AltaPersona($nombre, $apellido_paterno, $apellido_materno, $genero, $telefono, $correo, $fecha_nacimiento, $u_password, $NFC, "1", "");

        $ad= new Administrador();
        $ad->AltaAdmin($per->UltimaPersona());


    } catch (Exception $e) {
        echo($e->getMessage());
    }