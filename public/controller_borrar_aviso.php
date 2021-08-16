<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        $al=new personas_avisos();        
        $al->BorrarAP($id_av);

        $gp=new avisos();
        $gp->eliminarAv($id_av);

   
    } catch (Exception $e) {
        echo($e->getMessage());
    }