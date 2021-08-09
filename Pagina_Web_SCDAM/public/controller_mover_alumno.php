<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        $al=new Alumno();        
        $al->MoverAlumno($mat, $id_grup);

    } catch (Exception $e) {
        echo($e->getMessage());
    }