<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);   
        $periodoC = $periodo . ' ' . $ano;    
        $per=new Grupo();        
        $per->NuevoGrupo($grado, $seccion, $turno, $periodoC);

    } catch (Exception $e) {
        echo($e->getMessage());
    }