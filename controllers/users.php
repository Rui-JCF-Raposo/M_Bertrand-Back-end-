<?php

    if(!isset($_SESSION["user"])) {
        header("Location: ".BASE_PATH."login");
        exit;
    }

    
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        
        require("models/user.php");
        $userModel = new User();
        
        $data = json_decode(file_get_contents("php://input"), true);

        if(isset($data["field_name"])) {
            
            $white_list = ["name", "email", "card_number"];
            
            if(empty($data) || !in_array($data["field_name"], $white_list)) {
                header("HTTP/1.1 400 Bad Request");
                die(json_encode(["message" => "400 Bad Request"]));
            }
            
            if($data["field_name"] === "name") {
    
                $result = $userModel->updateUserName($data["new_value"]);
                if($result) {
                    $_SESSION["user"]["name"] = $data["new_value"];
                }
    
            } else if($data["field_name"] === "email") {
                
                $result = $userModel->updateUserEmail($data["new_value"]);
                if($result) {
                    $_SESSION["user"]["email"] = $data["new_value"];
                }
    
            } else if($data["field_name"] === "card_number") {
                
                $result = $userModel->updateUserCardNumber($data["new_value"]);
                if($result) {
                    $_SESSION["user"]["card_number"] = $data["new_value"];
                }
    
            }

        }

        
        if(isset($_POST["change_password"])) {
            $result = $userModel->updatePassword($_POST);
            if($result) {
                $password_updated = true;
            } else {
                $password_updated = false;
            }
            require("templates/userEditMessage.php");
            exit;
        } 

        if($result) {
            header("HTTP/1.1 202 Accepted");
            die(json_encode(["message" => "Successfully Updated"]));
        } else {
            header("HTTP/1.1 400 Bad Request");
            die(json_encode(["message" => "400 Bad Request"]));
        }
    } 


    if(isset($url_parts[3])) {

            $section = $url_parts[3];
            
            if($section === "userData") {
                require("views/clientLoggedIn/userData.php");
            }

    }