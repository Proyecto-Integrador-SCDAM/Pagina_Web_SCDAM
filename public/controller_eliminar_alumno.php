<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        
        #ALTA PERSONA
        $per=new Persona();
        $alu = new Alumno();
        $reg = new registros();

        //Conseguir ID de la matrícula
        $idcon = $alu->MatAID($matcon);

        //Eliminar registro
        $reg->EliminarRegistrosPersona($idcon);

        //Eliminar alumno
        $alu->EliminarAlumno($matcon);

        //Eliminar persona
        $per->EliminarPersona($idcon);


    } catch (Exception $e) {
        echo($e->getMessage());
    }