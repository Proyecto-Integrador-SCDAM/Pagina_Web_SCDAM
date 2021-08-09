<?php
    
    namespace proyecto;
    
    use Exception;
    try {
        require("../../../vendor/autoload.php");
        
        $auth = new Auth();
        /*
        if (!$auth->getUser()) {
            header("Location: ../../index.html");
            exit();
        }*/

        $aux = $auth->getUser()["Con_usuario"];

        if ($aux != "Maestro") {
            header("Location: ../../index.html");
            exit();
        }

    } catch (Exception $e) {
        echo($e->getMessage());
    }