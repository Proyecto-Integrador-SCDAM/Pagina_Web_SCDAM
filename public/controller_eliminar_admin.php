<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        
        //Eliminar registro
        $reg = new registros();
        $reg->EliminarRegistrosPersona($idcon);
        #Eliminar persona avisos
        $pa = new personas_avisos();
        $pa->EliminarPorPersona($idcon);
        #Eliminar avisos
        $av = new avisos();
        $av->EliminarSinAutor();
        #Eliminar admin
        $ad = new Administrador();
        $ad->Eliminar($idcon);
        #ELIMINAR PERSONA
        $per=new Persona();  
        $per->EliminarPersona($idcon);
    } catch (Exception $e) {
        echo($e->getMessage());
    }