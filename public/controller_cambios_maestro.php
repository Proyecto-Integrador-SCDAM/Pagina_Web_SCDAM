<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        
        #ALTA PERSONA
        $per = new Persona();
        $gp = new Grupo_profesor();

        //Cambios persona         
        $per->EditarPersona($idcon, $nombre, $apellido_paterno, $apellido_materno, $genero, $telefono, $correo, $fecha_nacimiento, $u_password, $NFC, $permiso, $causa_denegada);

        //Reiniciar grupos
        $gp->EliminarGruposProfe($idcon);

    } catch (Exception $e) {
        echo($e->getMessage());
    }