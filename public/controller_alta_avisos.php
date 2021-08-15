<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);      
        $per=new avisos();        
        $per->altaAvisos($titulo, $cuerpo);

        $ad=new personas_avisos();
        $ad->datosPer($persona_av, $per->UltimoAviso());


    } catch (Exception $e) {
        echo($e->getMessage());
    }