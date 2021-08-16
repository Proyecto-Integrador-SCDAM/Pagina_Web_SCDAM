<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        
        #ALTA PERSONA
        $per=new Persona();
        $alu = new Alumno();
        $gru = new Grupo();

        //Conseguir ID de la matrícula
        $idcon = $alu->MatAID($matcon);
        //Cambios persona         
        $per->EditarPersona($idcon, $nombre, $apellido_paterno, $apellido_materno, $genero, $telefono, $correo, $fecha_nacimiento, $u_password, $NFC, $permiso, $causa_denegada);
        //Conseguir ID del grupo por su nombre
        $aux = $gru->GrupoConcatenado($grupocon);

        if (!$aux){
            $aux = $gru->SinGrupo();
        }

        $alu->EditarAlumno($matcon, $especialidad, $aux);

    } catch (Exception $e) {
        echo($e->getMessage());
    }