<?php

    require("models/user.php");
    $model = new User();

    $whiteList = ["register", "login", "logout"];

    if(!isset($url_parts[3]) || !in_array($url_parts[3], $whiteList)) {
        header("HTTP/1.1 400 Bad Request");
        die("400 Bad Request");
    }


    // Taking care of registration -------------
    if(isset($_POST["register_send"]) && $url_parts[3] === "register") {

        $user_id= $model->create($_POST);
        if(!$user_id) {

            header("Location: ".BASE_PATH."register");

        } else {

            $user = $model->getUser($user_id);
            $_SESSION["user"] = $user;
            header("Location: ".BASE_PATH."dashboard");
            
        }
    }

    // Taking care of login --------------------
    if(isset($_POST["login_send"]) && $url_parts[3] === "login") {
        
        $user = $model->validateLogin($_POST);
        if(!$user) {
            
            header("Location: ".BASE_PATH."login");
        
        } else {
            
            $_SESSION["user"] = $user;
            header("Location: ".BASE_PATH."dashboard");
        
        }
    }

    // Taking care of logout
    if(isset($url_parts[3]) && $url_parts[3] === "logout") {
        session_destroy();
        header("Location: ".BASE_PATH."home");
    }