<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        $per=new Persona();
        $alu = new Alumno();
        $idaux = $alu->MatAID($idcon);
        echo ($per->BuscarPer($idaux));
    } catch (Exception $e) {
        echo($e->getMessage());
    }