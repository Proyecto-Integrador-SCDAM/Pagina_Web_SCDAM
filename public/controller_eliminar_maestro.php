<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        
        #ALTA PERSONA
        $per=new Persona();
        $pro = new Profesor();
        $reg = new registros();
        $gp = new Grupo_profesor();

        //Eliminar persona
        $per->EliminarPersona($idcon);


    } catch (Exception $e) {
        echo($e->getMessage());
    }