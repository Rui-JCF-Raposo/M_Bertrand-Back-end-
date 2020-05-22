<?php 

    if(!isset($_SESSION["user"])) {
        header("Location: ".BASE_PATH."login");
        exit;
    }
    
    require("models/order.php");
    $orderModel = new Order();

    $categories = $orderModel->getCategories();
    $orders = $orderModel->getUserOrders();
        
    require("views/clientLoggedIn/userOrders.php");
