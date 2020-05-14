<?php

    require("models/user.php");
    $model = new User();
    
    // Taking care of registration -------------
    if(isset($_POST["register_send"])) {
        //print_r($_POST); exit;
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
    if(isset($_POST["login_send"])) {
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