<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        
        #Eliminar persona avisos
        $gru = new Grupo();
        echo json_encode($gru->ContarGrupos());

    } catch (Exception $e) {
        echo($e->getMessage());
    }