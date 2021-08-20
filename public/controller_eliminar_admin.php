<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        
        //Eliminar registro
        #ELIMINAR PERSONA
        $per=new Persona();  
        $per->EliminarPersona($idcon);
    } catch (Exception $e) {
        echo($e->getMessage());
    }