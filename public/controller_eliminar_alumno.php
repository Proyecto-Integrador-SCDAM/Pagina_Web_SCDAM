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

        //Eliminar persona
        $per->EliminarPersona($idcon);


    } catch (Exception $e) {
        echo($e->getMessage());
    }