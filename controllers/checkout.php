<?php

    require("models/checkout.php");
    $checkoutModel = new Checkout();

    if(isset($_GET["order"]) && $_GET["order"] === "true") {
        
        
        if(!isset($_SESSION["user"])) {
            header("Location: ".BASE_PATH."login");
            exit;
        }
       
        if(!isset($_SESSION["shopcart_books"])) {
            header("Location: ".BASE_PATH."dashboard");
            exit;
  
        }
        $books = $_SESSION["shopcart_books"];
        $user_id = $_SESSION["user"]["user_id"];


        $order_id = $checkoutModel->createOrder($user_id, $books);
        $result = $checkoutModel->createOrderDetails($order_id, $books);

        if($result) {
            header("HTTP/1.1 202 Accepted");
            $_SESSION["shopcart_books"] = [];
            require("templates/successOrder.php");
        } else {
            header("HTTP/1.1 400 Bad Request");
            die("400 Bad Request");
        }

    } else {
        require("views/clientLoggedIn/shopcartCheckOut/checkout.php");
    }

