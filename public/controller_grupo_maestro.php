<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        
        #Eliminar persona avisos
        $gp = new Grupo_profesor();
        echo ($gp->CompGrupoProfe($grupo, $idcon));

    } catch (Exception $e) {
        echo($e->getMessage());
    }