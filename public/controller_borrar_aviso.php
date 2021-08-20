<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);

        $gp=new avisos();
        $gp->eliminarAv($id_av);

   
    } catch (Exception $e) {
        echo($e->getMessage());
    }