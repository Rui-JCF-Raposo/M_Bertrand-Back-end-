<?php
    $url_parts = explode("/", $_SERVER["REQUEST_URI"]);
    define("BASE_PATH", dirname($_SERVER["SCRIPT_NAME"])."/");
    
    //print_r($url_parts); exit;

    // print_r($url_parts);
    
    /*
        $url_parts[4] === controller;
        $url_parts[5] === section/action;
    */

    $controllers = ["home", "login", "register", "wishlists", "books", "dashboard"];

    if(in_array($url_parts[4], $controllers)) {
        $controller = $url_parts[4];
    }

    require("./controllers/".$controller.".php");

  