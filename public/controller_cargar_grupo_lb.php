<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        $alu = new Alumno();
        echo($alu->GrupoMat($matcon));
    } catch (Exception $e) {
        echo($e->getMessage());
    }