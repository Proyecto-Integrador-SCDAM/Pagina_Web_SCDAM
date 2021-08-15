<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        
        #ALTA PERSONA
        $per=new Persona();  
        
        #Eliminar avisos
        #Eliminar admin

        $per->EliminarPersona($idcon);
    } catch (Exception $e) {
        echo($e->getMessage());
    }