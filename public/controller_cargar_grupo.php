<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        
        $gr= new Grupo();
        echo ($gr->GrupoASC());


    } catch (Exception $e) {
        echo($e->getMessage());
    }