<?php
    $action = $url_parts[7];
    
    if(!$action) {
        require("views/home.php"); 
    }
    
    if($action === "login") {   
        require("views/areaCliente/login.php");
    } else if($action === "register") {
        require("views/areaCliente/register.php");
    }
