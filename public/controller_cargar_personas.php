<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        $per=new Persona();
        echo ($per->BuscarPer($idcon));
    } catch (Exception $e) {
        echo($e->getMessage());
    }