<?php

    namespace proyecto; 
    
    use Exception;
    
   try{
        require("../vendor/autoload.php");
       
        extract($_POST);       
        $c=new Persona();
        $Aux = "0";
        
        $Aux = ( $c->CorreoExistente($dCorreo));

        if ($Aux == "0"){
            if ($dNFC != ""){
                $Aux = ( $c->NFCExistente($dNFC));
            }
        }


        $RespuestaCon = [
            "msg" => $Aux
        ];

        echo json_encode($RespuestaCon);
   
    } catch (Exception $e) {
        echo($e->getMessage());
    }
