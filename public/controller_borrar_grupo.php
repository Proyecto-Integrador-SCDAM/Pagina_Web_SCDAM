<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        $al=new Alumno();        
        $al->EliminarGrupo($id_grup);

        $gp=new Grupo_profesor();
        $gp->EliminarGrupo($id_grup);

        $gr=new Grupo();
        $gr->EliminarGrupo($id_grup);

   
    } catch (Exception $e) {
        echo($e->getMessage());
    }