<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        
        #ALTA PERSONA
        $per=new Persona();        
        $per->EditarPersona($idcon, $nombre, $apellido_paterno, $apellido_materno, $genero, $telefono, $correo, $fecha_nacimiento, $u_password, $NFC, "1", "");

    } catch (Exception $e) {
        echo($e->getMessage());
    }