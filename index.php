<?php

    session_start();
    //session_destroy();

    $url_parts = explode("/", $_SERVER["REQUEST_URI"]);
    define("BASE_PATH", dirname($_SERVER["SCRIPT_NAME"])."/");
    //print_r($url_parts); exit;

    // print_r($url_parts);
    
    /*
        $url_parts[2] === controller;
        $url_parts[3] === section/action;
    */

    $controllers = ["home", "login", "register", "users","wishlists", "books", "dashboard"];

    if(in_array($url_parts[2], $controllers)) {
        $controller = $url_parts[2];
    }

    require("./controllers/".$controller.".php");

  