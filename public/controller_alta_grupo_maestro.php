<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        
        
        #GRUPO PROFESOR
        $pro=new Profesor();        
        $gp = new Grupo_profesor();
        
        $gp->NuevoMaestroG($id_grup, $pro->UltimoProfe());
        

    } catch (Exception $e) {
        echo($e->getMessage());
    }